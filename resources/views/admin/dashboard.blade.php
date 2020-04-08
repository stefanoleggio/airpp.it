@extends('templates.admin')

@section('content')
@include('includes.admincard', 
        [
            'title' => 'Dashboard',
            'description' => 'Benvenuto nel pannello amministrativo di airpp.it'
        ]
    )
    <div class="container">
      <div class="text-center">
        <iframe width="600" height="371" class="embed-responsive-item" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQOPTfMi_OMgWF-mh9mvyx9kmBdWwU5GVpuTgCfWOfDzQG7lZc18L5iSmcV0N9-sAjRBS58Xx8PtLNQ/pubchart?oid=1194469025&amp;format=interactive"></iframe>
      </div>
      <div class="text-center mt-5">
        <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQOPTfMi_OMgWF-mh9mvyx9kmBdWwU5GVpuTgCfWOfDzQG7lZc18L5iSmcV0N9-sAjRBS58Xx8PtLNQ/pubchart?oid=1072739423&amp;format=interactive"></iframe>
          </div>
      <div class="text-center mt-5">
        <iframe width="600" height="371" class="embed-responsive-item" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQOPTfMi_OMgWF-mh9mvyx9kmBdWwU5GVpuTgCfWOfDzQG7lZc18L5iSmcV0N9-sAjRBS58Xx8PtLNQ/pubchart?oid=1742141464&amp;format=interactive"></iframe>
      </div>
      <div class="text-center mt-5">
        <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQOPTfMi_OMgWF-mh9mvyx9kmBdWwU5GVpuTgCfWOfDzQG7lZc18L5iSmcV0N9-sAjRBS58Xx8PtLNQ/pubchart?oid=66749362&amp;format=interactive"></iframe>
      </div>
      <div class="text-center mt-5">
      <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQOPTfMi_OMgWF-mh9mvyx9kmBdWwU5GVpuTgCfWOfDzQG7lZc18L5iSmcV0N9-sAjRBS58Xx8PtLNQ/pubchart?oid=37859&amp;format=interactive"></iframe>
        </div>

    </div>
    
@endsection
