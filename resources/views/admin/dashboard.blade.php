@extends('templates.admin')

@section('content')
@include('includes.admincard', 
        [
            'title' => 'Dashboard',
            'description' => 'Benvenuto nel pannello amministrativo di airpp.it'
        ]
    )
    <div class="container">
      <div class="text-center" id="1">
        <iframe width="600" height="371" class="embed-responsive-item" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQOPTfMi_OMgWF-mh9mvyx9kmBdWwU5GVpuTgCfWOfDzQG7lZc18L5iSmcV0N9-sAjRBS58Xx8PtLNQ/pubchart?oid=1194469025&amp;format=interactive"></iframe>
      </div>
      <div class="text-center mt-5" id="2">
        <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQOPTfMi_OMgWF-mh9mvyx9kmBdWwU5GVpuTgCfWOfDzQG7lZc18L5iSmcV0N9-sAjRBS58Xx8PtLNQ/pubchart?oid=1072739423&amp;format=interactive"></iframe>
          </div>
      <div class="text-center mt-5" id="3">
        <iframe width="600" height="371" class="embed-responsive-item" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQOPTfMi_OMgWF-mh9mvyx9kmBdWwU5GVpuTgCfWOfDzQG7lZc18L5iSmcV0N9-sAjRBS58Xx8PtLNQ/pubchart?oid=1742141464&amp;format=interactive"></iframe>
      </div>
      <div class="text-center mt-5" id="4">
        <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQOPTfMi_OMgWF-mh9mvyx9kmBdWwU5GVpuTgCfWOfDzQG7lZc18L5iSmcV0N9-sAjRBS58Xx8PtLNQ/pubchart?oid=66749362&amp;format=interactive"></iframe>
      </div>
      <div class="text-center mt-5" id ="5">
      <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQOPTfMi_OMgWF-mh9mvyx9kmBdWwU5GVpuTgCfWOfDzQG7lZc18L5iSmcV0N9-sAjRBS58Xx8PtLNQ/pubchart?oid=37859&amp;format=interactive"></iframe>
        </div>
        <div class="d-flex justify-content-center pt-5">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" id="link_1" href="javascript:showPage(1)">1</a></li>
            <li class="page-item"><a class="page-link" id="link_2" href="javascript:showPage(2)">2</a></li>
            <li class="page-item"><a class="page-link" id="link_3" href="javascript:showPage(3)">3</a></li>
            <li class="page-item"><a class="page-link" id="link_4" href="javascript:showPage(4)">4</a></li>
            <li class="page-item"><a class="page-link" id="link_5" href="javascript:showPage(5)">5</a></li>
          </ul>
        </nav>
        </div>
    </div>
    <script type="text/javascript">
      function showPage(page){
        for(var i = 1; i < 6; i++){
          document.getElementById(i).style.display = "none"; 
        }
        document.getElementById(page).style.display = "block"; 
      }

      function initPage(){
        for(var i = 2; i < 6; i++){
          document.getElementById(i).style.display = "none"; 
        }
      }
      window.onload = function() {
        setTimeout(function(){ initPage(); }, 100);
      };
    </script>
@endsection
