@extends('layout/master')

@section('title','Reservations App')

@section('content')
       
<main>

<!-- Start Locations -->
<section class="locsView" id="locsView">
  <div class="container-fluid">
    <div class="special-heading">Locations</div>
      <p>Créer une location</p>
  <div class="row">

    <div class="col-12 col-sm-12 col-lg-8 offset-3">
      
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">

  <form action="{{ route('create.location') }}" method="POST" class="row g-3" id="createloc">
      @csrf
  <div class="col-md-8">
    <label for="nom_location" class="form-label">Nom Location</label>
    <input name="nomlocation" type="text" class="form-control" id="nom_location" >
    @error('nomlocation')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-12">
    <div class="form-check">
      <input name="chk" class="form-check-input" type="checkbox" id="reservCheck">
      <label class="form-check-label" for="reservCheck">
        Cochez moi
      </label>
    @error('chk')
    <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-dark">Créer Location</button>
  </div>
</form>
      
    </div>
   </div>
  </div>

  </div>
 
  @if ($message = Session::get('create_location_success'))
   <x-bootstrapalertsiconssvg />
  <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    <div>
      {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  @endif
  
  
</section>
<!-- End Locations -->


<!-- Start Products -->
<section class="reservationsView" id="reservationsView">
  <div class="container-fluid">
    <div class="special-heading">Locations</div>
      <p>Voir les Locations</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="locataires-table mt-5 mb-5">
        <div class="table-responsive">
          <table class="table display" id="locationsDatatable">
            <caption>Liste des Locations</caption>
            <thead class="table-dark">
              <th scope="col">#id_loc</th>
              <th scope="col">#Nom_salle</th>   
              <th scope="col">Action</th>
            </thead>
            <tbody id="tbodyL">
              @foreach ($locations as $key => $item)          
              <tr>
                <td><a href="/locations/view/{{  $item->id  }}">{{ $item->id }}</a></td>
                <td>{{ $item->location_name }}</td>
                <td><div><a id="btnDelete" style="display:block;width:45px;margin-bottom:5px;" href="/locations/view/{{  $item->id  }}/delete" type="button" class="btn btn-info"><i class="fa fa-trash-alt"></a></div></td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
      
        </div>
    </div>
  </div>
  <div class="col col-sm col-lg-2">
  </div>
  </div>
 
</section>
<!-- End Products -->


<section class="stats">
  <div class="container-fluid">
    <h2 class="special-heading">Statistiques</h2>
      <p>Statistiques des salles</p>

      
<!-- Overall chart-->
      <div class="row">
      <div class="col col-lg-2 col-sm-1">
      </div>
      <div class="col-12 col-lg-8 col-sm-10">
        <div class="stat">
     <canvas id="totalreservationspie"  height="400"  width="400"></canvas>
     </div>
    </div>
    <div class="col col-lg-2 col-sm-1">
      </div>
      </div>
     

      <!-- this year chart chart-->
      <div class="row">
        <div class="col col-lg-2 col-sm-1">
        </div>
        <div class="col-12 col-lg-8 col-sm-10">
          <div class="stat">
       <canvas id="thisyearreservationspie" height="400"  width="400"></canvas>
       </div>
      </div>
      <div class="col col-lg-2 col-sm-1">
        </div>
        </div>


         <!-- monthly chart chart-->
      <div class="row">
        <div class="col col-lg-2 col-sm-1">
        </div>
        <div class="col-12 col-lg-8 col-sm-10">
          <div class="stat">
       <canvas id="monthlyreservationsbar" height="200"  width="400"></canvas>
       </div>
      </div>
      <div class="col col-lg-2 col-sm-1">
        </div>
        </div>


        <!-- weekly chart chart-->
      <div class="row">
        <div class="col col-lg-2 col-sm-1">
        </div>
        <div class="col-12 col-lg-8 col-sm-10">
          <div class="stat">
       <canvas id="weeklyreservationsbar" height="200"  width="400"></canvas>
       </div>
      </div>
      <div class="col col-lg-2 col-sm-1">
        </div>
        </div>

  </div>
</section>



</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


@endsection


@section('script')
<script>

//Datatable initiation 
  $("#locationsDatatable").DataTable(
    {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print','pageLength'
        ]
    }
  );

  const MONTHS = [
  'January',
  'February',
  'March',
  'April',
  'May',
  'June',
  'July',
  'August',
  'September',
  'October',
  'November',
  'December'
];

 function months(config) {
  var cfg = config || {};
  var count = cfg.count || 12;
  var section = cfg.section;
  var values = [];
  var i, value;

  for (i = 0; i < count; ++i) {
    value = MONTHS[Math.ceil(i) % 12];
    values.push(value.substring(0, section));
  }

  return values;
}

//global variables
  var Url = "{{ url('locations/getTotalPieChart') }}";
  var Labels = new Array();
  var Percentages = new Array();
  var colors = new Array();
  var datasets = new Array();

 var stats = {
   labels: Labels,
   percentages: Percentages
 }

 var dynamicColorsRGB = function() {
    var r = Math.floor(Math.random() * 255);
    var g = Math.floor(Math.random() * 255);
    var b = Math.floor(Math.random() * 255);
    return "rgb(" + r + "," + g + "," + b + ")";
}

var dynamicColorsRGBA = function() {
    var r = Math.floor(Math.random() * 255);
    var g = Math.floor(Math.random() * 255);
    var b = Math.floor(Math.random() * 255);
    return "rgba(" + r + "," + g + "," + b + "," + "0.2" + ")";
}

var dynamicColorsBackgroundAndBorder = function() {
    var r = Math.floor(Math.random() * 255);
    var g = Math.floor(Math.random() * 255);
    var b = Math.floor(Math.random() * 255);
    
    var rgb = [];
    var rgba = [];
   
    rgb.push("rgb(" + r + "," + g + "," + b + ")");
    rgba.push("rgba(" + r + "," + g + "," + b + "," + "0.2" + ")");
    
    const obj = {
      rgb: rgb,
      rgba: rgba
    }
    return obj;
}

    var generateColor = function(dt) {

      var chart_colors = [];
      var count_colors = dt.length;

      for(var i = 0;i<count_colors;i++) {
       chart_colors[i] = dynamicColorsRGB();
      }
       return chart_colors;
    }

    var generateColorRGBA = function(dt) {

var chart_colors = [];
var count_colors = dt.length;

for(var i = 0;i<count_colors;i++) {
 chart_colors[i] = dynamicColorsRGBA();
}
 return chart_colors;
}

var generateColorBackgroundAndBorder = function(dt) {

var chart_colors = [];
var count_colors = dt.length;

for(var i = 0;i<count_colors;i++) {
 chart_colors[i] = dynamicColorsBackgroundAndBorder();
}
 return chart_colors;
}

    var makeChart = function(chartId,responsedata,title,chartType,config) {
        stats.labels = [];
        stats.percentages = [];

      console.log(responsedata);
            responsedata.forEach(function(data){
                stats.labels.push(data.location_name);
                stats.percentages.push(parseFloat(data.percentage));   
                });

     var options = {
       plugins: {
         title: {
                display: true,
                text: title,
                color: '#911',
                padding: 20,
                font: {
                  family: 'Comic Sans MS',
                  size: 20,
                  weight: 'bold',
                  lineHeight: 1.2,
                }
            },
            legend: {
                display: true,

            }
        },
					responsive:true,
          maintainAspectRatio: false,
				};
        config.labels = stats.labels;
        config.datasets[0].backgroundColor =  generateColor(stats.labels);
        config.datasets[0].data = stats.percentages;

      var myChart = $(chartId);
      var graph = new Chart(myChart, {
					type: chartType,
					data:config,
          options: options
				});
        return myChart;
    }


    var makeMonthlyChart = function(chartId,responsedata,title,chartType) {
      const chart_labels = months({count: 12});
        stats.labels = [];
        stats.percentages = [];

      console.log(responsedata);
            responsedata.forEach(function(data){
                stats.labels.push(data.location_name);
                stats.percentages.push(parseFloat(data.percentage));           
                });

     /*var options = {
       plugins: {
         title: {
                display: true,
                text: title,
                color: '#911',
                padding: 20,
                font: {
                  family: 'Comic Sans MS',
                  size: 20,
                  weight: 'bold',
                  lineHeight: 1.2,
                }
            },
            legend: {
                display: true,
            }
        },
					responsive:true,
          maintainAspectRatio: false,
				};*/
 
 /*var rgbColor = generateColorBackgroundAndBorder([1]);
 var dataset = {
  label: location_name,
  data:  percentage,
  backgroundColor: rgbColor.rgba,
  borderColor: rgbColor.rgb,
  borderWidth: 1
 };*/

       
responsedata.forEach(function(res){

  const sample = ['sample'];

  var rgbColor = generateColorBackgroundAndBorder(sample);
 console.log(rgbColor);

  var dataset = {
  label: res.location_name,
  data:  res.percentage,
  backgroundColor: rgbColor[0].rgba,
  borderColor: rgbColor[0].rgb,
  borderWidth: 1
 };

 datasets.push(dataset);

});


const data = {
  labels: chart_labels,
  datasets: datasets
};

console.log(data);
config = {
  type: 'bar',
  data: data,
  labels: data.labels,
  datasets: data.datasets,
  options: 
  {
       plugins: {
         title: {
                display: true,
                text: title,
                color: '#911',
                padding: 20,
                font: {
                  family: 'Comic Sans MS',
                  size: 20,
                  weight: 'bold',
                  lineHeight: 1.2,
                }
            },
            legend: {
                display: true,
            }
        },
					responsive:true,
          maintainAspectRatio: false,
  },
};
    console.log(config);
      var myChart = $(chartId);
      var graph = new Chart(myChart, {
					type: chartType,
					data:config
				});
        return myChart;
    }

    var makeWeeklyChart = function(chartId,responsedata,title,chartType) {

        stats.labels = [];
        stats.percentages = new Array();
        var daynames = [];
        var ds = [];
      
      console.log(responsedata);
            responsedata.forEach(function(data){
                stats.labels.push(data.location_name);
                stats.percentages.push(parseFloat(data.percentage));     
                daynames.push(data.dayname)      
                });
    
  responsedata.forEach(function(res){

  const sample = ['sample'];

  var rgbColor = generateColorBackgroundAndBorder(sample);
 console.log(rgbColor);

  var dataset = {
  label: res.location_name,
  data:  [res.percentage],
  backgroundColor: rgbColor[0].rgba,
  borderColor: rgbColor[0].rgb,
  borderWidth: 1
 };

 ds.push(dataset);

});


const data = {
  labels: daynames,
  datasets: ds
};

console.log(data);
config = {
  type: 'bar',
  data: data,
  labels: data.labels,
  datasets: data.datasets,
  options: 
  {
       plugins: {
         title: {
                display: true,
                text: title,
                color: '#911',
                padding: 20,
                font: {
                  family: 'Comic Sans MS',
                  size: 20,
                  weight: 'bold',
                  lineHeight: 1.2,
                }
            },
            legend: {
                display: true,
            }
        },
					responsive:true,
          maintainAspectRatio: false,
  },
};
    console.log(config);
      var myChart = $(chartId);
      var graph = new Chart(myChart, {
					type: chartType,
					data:config
				});
        return myChart;
    }

 $(document).ready(function(){

  $.ajax({
			url: Url,
			method:"GET",
			dataType:"JSON",
			success:function(response)
			{

var TotalPieconfig = {
  labels: [],
					datasets:[
						{
							label:'Vote',
							backgroundColor: [],
							color:'#fff',
							data: []
						}
					]
				};

 var ThisYearPieconfig = {
     labels: [],
					datasets:[
						{
							label:'Vote',
							backgroundColor: [],
							color:'#fff',
							data: []
						}
					]
				};
      

  //overall chart
  makeChart('#totalreservationspie',response.overalldata,'Overall Reservation rooms Chart','pie',TotalPieconfig);

  // this year chart
  makeChart('#thisyearreservationspie',response.thisyeardata,  new Date().getFullYear()+' Reservation rooms Chart','pie',ThisYearPieconfig);

  // monthly chart
  makeMonthlyChart('#monthlyreservationsbar',response.monthlydata,  new Date().getFullYear()+' Monthly Reservation rooms Chart','bar');

  // monthly chart 
  makeWeeklyChart('#weeklyreservationsbar',response.weeklydata,  new Date().getFullYear()+' Weekly Reservation rooms Chart','bar');
}
  });


 });

</script>
@endsection