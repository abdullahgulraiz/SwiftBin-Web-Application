@extends('layouts.main')
@section('title', 'Users')
@section('content')
<div class="row">
@for ($i = 0; $i < count($users); $i++)
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <a href="#" style="color:#000;">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big text-center" style="color:#{{substr(md5(rand()), 0, 6)}}">
                                <i class="ti-user"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>{{ $users[$i]->name }}</p>
                                {{ count($users[$i]->bins) }} bins
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <i class="ti-reload"></i>
                            @if ($latestObs[$i] != null)
                            {{ (new \DateTime($latestObs[$i]->created_at))->format("d-M-Y, h:i A")}}
                            @else
                            N/A
                            @endif
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endfor
</div>
@endsection