@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-6">
            <h5 class="font-weight-bold text-dark">Detail Project</h5>
          </div>
          <div class="col-6 text-right">
            <a href="{{ route('projects.index') }}" class="btn btn-sm btn-info">Back</a>
            <a href="{{ route('projects.tasks.index', $project->id) }}" class="btn btn-sm btn-success">Tasks</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <h5 class="card-title">{{ $project->name }}</h5>
        <p class="card-text">{{ $project->contract_date }}</p>
        @if(!$tasks->isEmpty())
        <div id="chartContainer" style="width:100%; height:800px;"></div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection

@section('css')
<style>
  #chartContainer .highcharts-credits {
    display: none
  }

  #chartContainer .highcharts-container,
  #chartContainer svg {
    width: 100%!important;
  }
</style>
@endsection

@section('js-src')
<script src="https://code.highcharts.com/gantt/highcharts-gantt.js"></script>
@endsection

@section('js')
@if(!$tasks->isEmpty())
<script>
  document.addEventListener('DOMContentLoaded', function() {
    Highcharts.ganttChart('chartContainer', {

      title: {
        text: '{{ $project->name }}'
      },

      xAxis: {
        tickPixelInterval: 10
      },

      yAxis: {
        type: 'category',
        grid: {
          enabled: true,
          borderColor: 'rgba(0,0,0,0.3)',
          borderWidth: 1,
          columns: [{
            title: {
              text: 'Project'
            },
            labels: {
              format: '{point.name}'
            }
          }, {
            labels: {
              format: '{point.start:%e. %b}'
            },
            title: {
              text: 'Start date'
            }
          }, {
            title: {
              text: 'End date'
            },
            offset: 30,
            labels: {
              format: '{point.end:%e. %b}'
            }
          }]
        }
      },

      tooltip: {
        xDateFormat: '%e %b %Y'
      },

      navigator: {
        enabled: true,
        liveRedraw: true,
        series: {
          type: 'gantt',
          pointPlacement: 0.5,
          pointPadding: 0.25
        },
        yAxis: {
          min: 0,
          max: 3,
          reversed: true,
          categories: []
        }
      },
      scrollbar: {
        enabled: true
      },
      rangeSelector: {
        enabled: true,
        selected: 0
      },

      responsive: {
        rules: [{
          condition: {
            maxWidth: 360
          }
        }]
      },

      series: [{
        name: '{{ $project->name }}',
        data: {!! $data !!},
      }]
    });
  });
</script>
@endif
@endsection