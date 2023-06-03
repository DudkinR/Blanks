@extends('layouts.app')
@section('title', __("Profole"))
@section('type', "profiles"))
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>Профиль пользователя</h2>
      <hr>
      <!-- link button route profile.edit-->
      <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary" title="{!!__('mainf.edit')!!} {!!mb_strtolower(__('mainf.profile'))!!}">
        <x-icon.main :name="'edit'" :size="'2'" :color="'black'" /></a>
      <a href="{{ route('profile.formwork', $user->id) }}" class="btn btn-primary" title="{!!__('Form works enverontments')!!}">
        <x-icon.main :name="'worker'" :size="'2'" :color="'black'" /></a>

      <table class="table bg-light">
        <tr>
          <td width="15%">{{__("Name")}}:</td>
          <td>{{ $user->name }}</td>
        <tr>
          <td>{{__("Works time with AB")}}:</td>
          <td>{{ $user->profile->time }}</td>
        </tr>
        <tr>
          <td>{{__("Sex")}}:</td>
          <td>
          <x-icon.main :name="'business'.$user->profile->sex" :size="'5'" :color="'#626262'" />
            
        </td>
        </tr>
        <tr>
          <td>{{__("profile.help")}}:</td>
          <td>
            <?php if ($user->profile->help == 1) {
                $helpcolor = "green";
            } else {
                $helpcolor = "red";
            } ?>
          <x-icon.main :name="'question-circle'" :size="2 :color="$helpcolor" />
            {{ $user->profile->help }}
          </td>
        </tr>
        <tr>
          <td>{{__("Money")}}:</td>
          <td>{{ $user->profile->money }}</td>
        </tr>
        <tr>
          <td>{{__("Image")}}:</td>
          <td><img src="{{ $user->profile->image }}" alt="">{{ $user->profile->image }}</td>
        </tr>
        <tr>
          <td>{{__("Size")}}:</td>
          <td>
          <x-icon.mytext :text="$user->profile->size" :bg="'grey'" :color="'white'" :size="$user->profile->size*3"/>
          </td>
        </tr>
        <tr>
          <td>{{__("Color")}}:</td>
          <td style="background:{{ $user->profile->color }}" >{{ $user->profile->color }}</td>
        </tr>
        <tr style="background:{{ $user->profile->background }}" >
          <td>{{__("Background")}}:</td>
          <td>{{ $user->profile->background }}</td>
        </tr>
        <tr>
          <td>{{__("Language")}}:</td>
          <td>
          <x-icon.mytext :text="$user->profile->lang" :bg="'red'" :color="'white'" :size=8 />

        </td>
        </tr>
      </table>
    </div>
    <div class="conteiner bg-light">
        <div class="row justify-content-center">
          <div class="col-md-4"></div>
          <div class="col-md-4 @if( $user->profile->tpanel == 1) bg-info @else bg-warning @endif">
          {{__("Top panel")}}}
          </div>
          <div class="col-md-4"></div>
        </div>
        <div class="row justify-content-center">

          <div class="col-md-4 @if( $user->profile->rpanel == 1) bg-info @else bg-warning @endif">
          {{__("Right panel")}}}
          </div>   
          <div class="col-md-4"></div>
          <div class="col-md-4 @if( $user->profile->lpanel == 1) bg-info @else bg-warning @endif">
          {{__("Left panel")}}}
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-4"></div>
          <div class="col-md-4 @if( $user->profile->bpanel == 1) bg-info @else bg-warning @endif">
          {{__("Down panel")}}}
          </div>
          <div class="col-md-4"></div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
