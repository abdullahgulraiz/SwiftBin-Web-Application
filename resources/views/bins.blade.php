@extends('layouts.main')
@section('title', 'Bins')
@section('content')
<div class="row">
@foreach ($bins as $b)
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <a href="/bins/{{ $b->id }}" style="color:#000;">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big text-center" style="color:#{{substr(md5(rand()), 0, 6)}}">
                                <i class="ti-trash"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>{{ $b->location }}</p>
                                {{ $b->observations->filter(function($obs) use ($b) {
                                    return (new \DateTime($obs->created_at))->format("d-M-Y") == (new \DateTime($b->observations->last()->created_at))->format("d-M-Y");
                                })->max('weight') }}
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <i class="ti-reload"></i>
                            <?php
                                $latest_obs = $b->observations->filter(function($obs) {
                                    return (new \DateTime($obs->created_at))->format("d-M-Y") == (new \DateTime())->format("d-M-Y");
                                })->sort()->last();
                                if (isset($latest_obs)) {
                                    echo "Today, ".(new \DateTime($latest_obs->created_at))->format("h:i A");
                                }
                                else {
                                    $latest_obs = $b->observations->sort()->last();
                                    echo (new \DateTime($latest_obs->created_at))->format("d-M-Y, h:i A");
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endforeach
</div>
<div class="row">
    <p><b>Data Input:</b><br><u>http://app.swiftechub.com/bins/input/[GSM Number]-[Weight]-[IR]</u><br></p>
</div>
@endsection