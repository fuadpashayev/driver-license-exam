@extends('layouts.app')

@section('title')
    <title>Dashboard</title>
@endsection

@section('content')
<style>
    #spot-break{
        display: none !important;
    }
    .dashboard-container a{
        color: #333 !important;
    }
</style>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="dashboard-container">
                <a href="{{route('user.index')}}">
                    <div class="dashboard-menu">
                        <div class="dashboard-menu-header">
                            <i class="material-icons color-danger">people</i>
                            <div>{{$counts['user']}}</div>
                        </div>
                        <div class="dashboard-menu-body">
                            <i class="material-icons">bubble_chart</i> Users
                        </div>
                        <div class="overlay"></div>
                    </div>
                </a>
                <a href="{{route('category.index')}}">
                    <div class="dashboard-menu">
                        <div class="dashboard-menu-header">
                            <i class="material-icons color-warning">dns</i>
                            <div>{{$counts['category']}}</div>
                        </div>
                        <div class="dashboard-menu-body">
                            <i class="material-icons">bookmarks</i> Categories
                        </div>
                        <div class="overlay"></div>
                    </div>
                </a>

                <a href="{{route('question.index')}}">
                    <div class="dashboard-menu">
                        <div class="dashboard-menu-header">
                            <i class="material-icons color-info">assignment</i>
                            <div>{{$counts['question']}}</div>
                        </div>
                        <div class="dashboard-menu-body">
                            <i class="material-icons">timeline</i> Questions
                        </div>
                        <div class="overlay"></div>
                    </div>
                </a>

                <div class="dashboard-menu">
                    <div class="dashboard-menu-header">
                        <i class="material-icons color-success">music_note</i>
                        <div>{{$counts['audio']}}</div>
                    </div>
                    <div class="dashboard-menu-body">
                        <i class="material-icons">cloud_upload</i> Audios
                    </div>
                    <div class="overlay"></div>
                </div>

                <div class="dashboard-menu">
                    <div class="dashboard-menu-header">
                        <i class="material-icons color-primary">photo</i>
                        <div>{{$counts['image']}}</div>
                    </div>
                    <div class="dashboard-menu-body">
                        <i class="material-icons">cloud_upload</i> Images
                    </div>
                    <div class="overlay"></div>
                </div>

                <div class="dashboard-menu">
                    <div class="dashboard-menu-header">
                        <i class="material-icons color-dark">chrome_reader_mode</i>
                        <div>{{$counts['sub_question']}}</div>
                    </div>
                    <div class="dashboard-menu-body">
                        <i class="material-icons">timeline</i> Sub questions
                    </div>
                    <div class="overlay"></div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{asset('general/js/general.js')}}"></script>
@endsection
