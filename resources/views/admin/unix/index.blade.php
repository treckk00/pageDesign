{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}


@extends('layouts.admin')
@include('partials/admin.unix.nav', ['activeTab' => 'basic'])

@section('title')
Unix
@endsection

@section('content-header')
<h1>Unix<small>Configure your with ease</small></h1>
<ol class="breadcrumb">
  <li><a href="{{ route('admin.index') }}">Admin</a></li>
  <li class="active">Unix</li>
</ol>
@endsection

<header>
  <link rel="stylesheet" href="/themes/unix/css/alerts.css" />
</header>



@section('content')
@yield('unix::nav')
@isset($status)
@if($status == 1)
<meta http-equiv = "refresh" content = "2; url = /admin/unix" />

<div class="alert alert-success alert-white rounded">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <div class="icon"><i class="fa fa-check"></i></div>
  <div style="padding-left:40px;" ><strong>Success!</strong> Changes has been saved successfully!</div>
</div>

@endif
@endisset
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Unix Configuration</h3>
      </div>
      <form action="{{ route('admin.unix.setting') }}" method="POST">
        @csrf
        <div class="box-body">
          <div class="row">

            <div class="form-group col-md-4">
              <label class="control-label">Logo</label>
              <div>
                <input type="text" class="form-control" name="logourl" value="@isset($setting_data['logourl']){{$setting_data['logourl']}}@else /assets/svgs/pterodactyl.svg @endisset" />
                <p class="text-muted"><small>**BETA Feature** This is the logo displayed on the login page etc</small></p>
              </div>
            </div>

            <div class="form-group col-md-4">
              <label class="control-label">Favicon</label>
              <div>
                <input type="text" class="form-control" name="unixfavicon" value="@isset($setting_data['unixfavicon']){{$setting_data['unixfavicon']}}@else https://cdn.resourcemc.net/zAsa7/rIBOyeRU58.png/raw @endisset" />
                <p class="text-muted"><small>**BETA Feature** This is the favicon displayed in browsers</small></p>
              </div>
            </div>

            <div class="form-group col-md-4">
              <label class="control-label">What type of Color selector do you want to use?</label>
              <div>
                <select class="form-control" name="colorsel">
                  <option value="@isset($setting_data['colorsel']){{$setting_data['colorsel']}} @endisset" selected="">Currently set to ->@isset($setting_data['colorsel'])@if($setting_data['colorsel'] == 1) Color Selector @else Text input  @endif
                    @endisset</option>
                  <option value="1">Color Selector</option>
                  <option value="2">Text input (Supports all formats)</option>
              </select>
                <p class="text-muted"><small>Choose between a easy-to-use color selector or all colors types. Text Input is recommended</small></p>
              </div>
            </div>

            <div class="form-group col-md-4">
              <label class="control-label">Enable image in login page?</label>
              <div>
                <select class="form-control" name="enableloginimg">
                  <option value="@isset($setting_data['enableloginimg']){{$setting_data['enableloginimg']}} @endisset" selected="">Currently set to ->@isset($setting_data['enableloginimg'])@if($setting_data['enableloginimg'] == 1) Disabled @else Enabled  @endif
                    @endisset</option>
                  <option value="1">Disabled</option>
                  <option value="disabled">Enabled</option>
              </select>
                <p class="text-muted"><small>**BETA Feature** Enable or Disable your logo in login page. (must end with .png .jpeg etc)</small></p>
              </div>
            </div>

            <div class="form-group col-md-4">
              <label class="control-label">Enable top navbar?</label>
              <div>
                <select class="form-control" name="topnavbar">
                  <option value="@isset($setting_data['topnavbar']){{$setting_data['topnavbar']}} @endisset" selected="">Currently set to ->@isset($setting_data['topnavbar'])@if($setting_data['topnavbar'] == 1) Disabled @else Enabled  @endif
                    @endisset</option>
                  <option value="1">Disabled</option>
                  <option value="enabled">Enabled</option>
              </select>
                <p class="text-muted"><small>Should the navigation bar in the homepage be enabled or disabled</small></p>
              </div>
            </div>

            <div class="form-group col-md-4">
              <label class="control-label">Enable top-bar in homepage?</label>
              <div>
                <select class="form-control" name="topbar">
                  <option value="@isset($setting_data['topbar']){{$setting_data['topbar']}} @endisset" selected="">Currently set to ->@isset($setting_data['topbar'])@if($setting_data['topbar'] == 1) Disabled @else Enabled  @endif
                    @endisset</option>
                  <option value="1">Disabled</option>
                  <option value="enabled">Enabled</option>
              </select>
                <p class="text-muted"><small>Should the information bar in the homepage be enabled or disabled</small></p>
              </div>
            </div>

            <div class="form-group col-md-4">
              <label class="control-label">Who can view their name top right</label>
              <div>
                <select class="form-control" name="viewname">
                  <option value="@isset($setting_data['viewname']){{$setting_data['viewname']}} @endisset" selected="">Currently set to ->@isset($setting_data['viewname'])@if($setting_data['viewname'] == 1) Admin Only @else Everyone  @endif
                    @endisset</option>
                  <option value="1">Admin only</option>
                  <option value="admin">Everyone</option>
              </select>
                <p class="text-muted"><small>Who can view their name top right?</small></p>
              </div>
            </div>

            <div class="form-group col-md-4">
              <label class="control-label">Primary Background Color</label>
              <div>
                <input @isset($setting_data['colorsel'])@if($setting_data['colorsel'] == 1) type="color" @else type="text"  @endif
                @endisset class="form-control" name="pcolor" value="@isset($setting_data['pcolor']){{$setting_data['pcolor']}}@else #1f1d2b @endisset" />
                <p class="text-muted"><small>This is the primary background template color.</small></p>
              </div>
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Secondary Background Color</label>
              <div>
                <input @isset($setting_data['colorsel'])@if($setting_data['colorsel'] == 1) type="color" @else type="text"  @endif
                @endisset class="form-control" name="scolor" value="@isset($setting_data['scolor']){{$setting_data['scolor']}}@else #0000000d @endisset" />
                <p class="text-muted"><small>This is the Secondary background template color.</small></p>
              </div>
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Tertiary Background Color</label>
              <div>
                <input @isset($setting_data['colorsel'])@if($setting_data['colorsel'] == 1) type="color" @else type="text"  @endif
                @endisset class="form-control" name="tcolor" value="@isset($setting_data['tcolor']){{$setting_data['tcolor']}}@else #0000001a @endisset" />
                <p class="text-muted"><small>This is the Tertiary background template color.</small></p>
              </div>
            </div>

            <div class="form-group col-md-4">
              <label class="control-label">Text Color</label>
              <div>
                <input @isset($setting_data['colorsel'])@if($setting_data['colorsel'] == 1) type="color" @else type="text"  @endif
                @endisset class="form-control" name="textcolor" value="@isset($setting_data['textcolor']){{$setting_data['textcolor']}}@else #808191 @endisset" />
                <p class="text-muted"><small>This is the color of the text.</small></p>
              </div>
            </div>

            <div class="form-group col-md-4">
              <label class="control-label">Active Text Color</label>
              <div>
                <input @isset($setting_data['colorsel'])@if($setting_data['colorsel'] == 1) type="color" @else type="text"  @endif
                @endisset class="form-control" name="activetextcolor" value="@isset($setting_data['activetextcolor']){{$setting_data['activetextcolor']}}@else white @endisset" />
                <p class="text-muted"><small>This is the color displayed when buttons are active or selected.</small></p>
              </div>
            </div>

            <div class="form-group col-md-4">
              <label class="control-label">Button Color</label>
              <div>
                <input @isset($setting_data['colorsel'])@if($setting_data['colorsel'] == 1) type="color" @else type="text"  @endif
                @endisset class="form-control" name="buttoncolor" value="@isset($setting_data['buttoncolor']){{$setting_data['buttoncolor']}}@else #0967d3 @endisset" />
                <p class="text-muted"><small>This is the color of the buttons on the pages.</small></p>
              </div>
            </div>

          </div>
        </div>
        <div class="box-footer">
          {!! csrf_field() !!}
          <button type="submit" class="btn btn-sm btn-primary pull-right">Save</button>
          <div><button type="submit" class="btn btn-sm btn-primary pull-left" style="background: rgb(207, 65, 65); border-color: rgb(207, 65, 65);">Reset to Defualt</button></div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
