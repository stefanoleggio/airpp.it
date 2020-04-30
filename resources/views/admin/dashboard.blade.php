@extends('templates.admin')

@section('content')
<!-- COVID -->
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <h3 class="alert-heading">Emergenza Covid-19</h3>
    <p>Si possono aggiungere articoli alla pagina per l'emergenza Covid-19 andando su:</br>Componenti > Covid</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- -->
@include('includes.admincard', 
        [
            'title' => 'Dashboard',
            'description' => 'Benvenuto nel pannello amministrativo di airpp.it'
        ]
    )
    <div class="row mt-5">
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Entrate mensili</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php $total = 0;
              foreach($earn_last_month_donations as $rows){
              $total += $rows->amount;
            }
            foreach($earn_last_month_joinus as $rows){
              $total += $rows->amount;
            }
            echo $total;
          ?> &euro;</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-euro-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
          </div>
        <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Donazioni mensili</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo sizeof($total_donations)?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-heart fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Iscrizioni mensili</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo sizeof($total_joinus)?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
          </div>

    </div>
    
    <div class="container">
          <div class="loading text-center" style="padding-top: 5rem;" id="loading">
              <img src="/media/gif/loading.gif" alt="">
          </div>
        <div style="visibility: hidden;" id="main">
      <div class="text-center" id="1">
        <iframe width="600" height="371" class="embed-responsive-item" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQOPTfMi_OMgWF-mh9mvyx9kmBdWwU5GVpuTgCfWOfDzQG7lZc18L5iSmcV0N9-sAjRBS58Xx8PtLNQ/pubchart?oid=1194469025&amp;format=interactive"></iframe>
      </div>
      <div class="text-center" id="2">
        <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQOPTfMi_OMgWF-mh9mvyx9kmBdWwU5GVpuTgCfWOfDzQG7lZc18L5iSmcV0N9-sAjRBS58Xx8PtLNQ/pubchart?oid=678246377&amp;format=interactive"></iframe>
      </div>
      <div class="text-center mt-5" id="3">
        <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQOPTfMi_OMgWF-mh9mvyx9kmBdWwU5GVpuTgCfWOfDzQG7lZc18L5iSmcV0N9-sAjRBS58Xx8PtLNQ/pubchart?oid=1072739423&amp;format=interactive"></iframe>
          </div>
      <div class="text-center mt-5" id="4">
        <iframe width="600" height="371" class="embed-responsive-item" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQOPTfMi_OMgWF-mh9mvyx9kmBdWwU5GVpuTgCfWOfDzQG7lZc18L5iSmcV0N9-sAjRBS58Xx8PtLNQ/pubchart?oid=1742141464&amp;format=interactive"></iframe>
      </div>
      <div class="text-center mt-5" id="5">
      <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQOPTfMi_OMgWF-mh9mvyx9kmBdWwU5GVpuTgCfWOfDzQG7lZc18L5iSmcV0N9-sAjRBS58Xx8PtLNQ/pubchart?oid=391148292&amp;format=interactive"></iframe>
      </div>
      <div class="text-center mt-5" id ="6">
      <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQOPTfMi_OMgWF-mh9mvyx9kmBdWwU5GVpuTgCfWOfDzQG7lZc18L5iSmcV0N9-sAjRBS58Xx8PtLNQ/pubchart?oid=37859&amp;format=interactive"></iframe>
        </div>
        <div class="d-flex justify-content-center pt-5">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item" id="link_1"><a class="page-link" href="javascript:showPage(1)">1</a></li>
            <li class="page-item" id="link_2"><a class="page-link" href="javascript:showPage(2)">2</a></li>
            <li class="page-item" id="link_3"><a class="page-link" href="javascript:showPage(3)">3</a></li>
            <li class="page-item" id="link_4"><a class="page-link" href="javascript:showPage(4)">4</a></li>
            <li class="page-item" id="link_5"><a class="page-link" href="javascript:showPage(5)">5</a></li>
            <li class="page-item" id="link_6"><a class="page-link" href="javascript:showPage(6)">6</a></li>
          </ul>
        </nav>
        </div>
        </div>
    </div>
    <script type="text/javascript">
      function showPage(page){
        for(var i = 1; i < 7; i++){
          document.getElementById(i).style.display = "none"; 
          document.getElementById("link_" + i).classList.remove("active");
        }
        document.getElementById(page).style.display = "block"; 
        document.getElementById("link_" + page).classList.add("active");
      }

      function initPage(){
        document.getElementById("link_1").classList.add("active");
        document.getElementById("loading").style.display = "none"; 
        for(var i = 2; i < 7; i++){
          document.getElementById(i).style.display = "none"; 
        }
      }
      window.onload = function() {
        setTimeout(function(){
          document.getElementById("main").style.visibility = "inherit";  
          initPage(); }, 1000);
      };
    </script>
@endsection
