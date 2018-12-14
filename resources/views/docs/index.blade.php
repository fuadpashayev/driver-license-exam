@extends('docs.app')
@section('title')
    <title>Documentation</title>
@endsection
@section('content')
@php 
$loading = '<div class="sk-fading-circle loading">
        <div class="sk-circle1 sk-circle"></div>
        <div class="sk-circle2 sk-circle"></div>
        <div class="sk-circle3 sk-circle"></div>
        <div class="sk-circle4 sk-circle"></div>
        <div class="sk-circle5 sk-circle"></div>
        <div class="sk-circle6 sk-circle"></div>
        <div class="sk-circle7 sk-circle"></div>
        <div class="sk-circle8 sk-circle"></div>
        <div class="sk-circle9 sk-circle"></div>
        <div class="sk-circle10 sk-circle"></div>
        <div class="sk-circle11 sk-circle"></div>
        <div class="sk-circle12 sk-circle"></div></div>';
@endphp
    <div class="container-fluid col-8" id="authentication">
        <h3>Authentication</h3>
        <div class="input-group spc-inp">
            <div class="inp-header">Login</div>
            <div class="inp-group no-filter">
                <div class="input-group-header bdr">Method</div>
                <input disabled value="POST"/>
            </div>
            <div class="inp-group no-filter">
                <div class="input-group-header bdr">URL</div>
                <input role="url" value="{{route("api.login")}}"/>
            </div>
            <div class="inp-group">
                <div class="input-group-header bdr">Parameter</div>
                <div class="input-group-header simple" contenteditable="true" placeholder="email" role="key">email</div>
                <input role="value" value="admin@app.com"/>
            </div>
            <div class="inp-group">
                <div class="input-group-header">Parameter</div>
                <div class="input-group-header simple" contenteditable="true" placeholder="password" role="key">password</div>
                <input role="value" value="password"/>
            </div>
            <button class="btn btn-primary col-12 no-radius test">{!!$loading!!} Test
            </button>
            <pre class="result"></pre>
        </div>

        <div class="input-group spc-inp">
            <div class="inp-header">Register</div>
            <div class="inp-group no-filter">
                <div class="input-group-header bdr">Method</div>
                <input disabled value="POST"/>
            </div>
            <div class="inp-group no-filter">
                <div class="input-group-header bdr">URL</div>
                <input role="url" value="{{route("api.register")}}"/>
            </div>
            <div class="inp-group">
                <div class="input-group-header bdr">Parameter</div>
                <div class="input-group-header simple" contenteditable="true" placeholder="email" role="key">name</div>
                <input value="Test"/>
            </div>
            <div class="inp-group">
                <div class="input-group-header bdr">Parameter</div>
                <div class="input-group-header simple" contenteditable="true" placeholder="email" role="key">email</div>
                <input value="test@app.com"/>
            </div>
            <div class="inp-group">
                <div class="input-group-header bdr">Parameter</div>
                <div class="input-group-header simple" contenteditable="true" placeholder="password" role="key">password</div>
                <input value="password"/>
            </div>
            <div class="inp-group">
                <div class="input-group-header">Parameter</div>
                <div class="input-group-header simple" contenteditable="true" placeholder="password_confirmation" role="key">password_confirmation</div>
                <input value="password"/>
            </div>
            <button class="btn btn-primary col-12 no-radius test">{!!$loading!!} Test</button>
            <pre class="result"></pre>
        </div>

        <div class="input-group spc-inp">
            <div class="inp-header">Fetch profile data</div>
            <div class="inp-group no-filter">
                <div class="input-group-header bdr">Method</div>
                <input disabled value="POST / GET"/>
            </div>
            <div class="inp-group no-filter">
                <div class="input-group-header bdr">URL</div>
                <input role="url" value="{{route("api.profile")}}"/>
            </div>
            <div class="inp-group">
                <div class="input-group-header">Header</div>
                <div class="input-group-header simple" contenteditable="true" placeholder="Header" role="key" type="header">Authorization</div>
                <input role="value" value="Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU0MjUzMjI5NywiZXhwIjoxNTQyNTM1ODk3LCJuYmYiOjE1NDI1MzIyOTcsImp0aSI6IjZkc3hJdFltYllaOVRrZmEiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.1zXUa6kXqXT8Vr-IWZSJCmIbdidW7zTakb1Y3dE2oLA"/>
            </div>
            <button class="btn btn-primary col-12 no-radius test">{!!$loading!!} Test
            </button>
            <pre class="result"></pre>
        </div>

        <div class="input-group spc-inp">
            <div class="inp-header">Logout</div>
            <div class="inp-group no-filter">
                <div class="input-group-header bdr">Method</div>
                <input disabled value="POST / GET"/>
            </div>
            <div class="inp-group no-filter">
                <div class="input-group-header bdr">URL</div>
                <input role="url" value="{{route("api.logout")}}"/>
            </div>
            <div class="inp-group">
                <div class="input-group-header">Header</div>
                <div class="input-group-header simple" contenteditable="true" placeholder="Header" role="key" type="header">Authorization</div>
                <input role="value" value="Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU0MjUzMjI5NywiZXhwIjoxNTQyNTM1ODk3LCJuYmYiOjE1NDI1MzIyOTcsImp0aSI6IjZkc3hJdFltYllaOVRrZmEiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.1zXUa6kXqXT8Vr-IWZSJCmIbdidW7zTakb1Y3dE2oLA"/>
            </div>
            <button class="btn btn-primary col-12 no-radius test">{!!$loading!!} Test
            </button>
            <pre class="result"></pre>
        </div>



    </div>







    <div class="container-fluid col-8" id="category">
        <h3>Category</h3>
        <div class="input-group spc-inp">
            <div class="inp-header">Fetch all categories</div>
            <div class="inp-group no-filter">
                <div class="input-group-header bdr">Method</div>
                <input disabled value="POST / GET"/>
            </div>
            <div class="inp-group no-filter">
                <div class="input-group-header">URL</div>
                <input role="url" value="{{route("api.categories.all")}}"/>
            </div>
            <button class="btn btn-primary col-12 no-radius test">{!!$loading!!} Test
            </button>
            <pre class="result"></pre>
        </div>

        <div class="input-group spc-inp">
            <div class="inp-header">Fetch all questions from specific category</div>
            <div class="inp-group no-filter">
                <div class="input-group-header bdr">Method</div>
                <input disabled value="POST / GET"/>
            </div>
            <div class="inp-group no-filter">
                <div class="input-group-header">URL</div>
                <input role="url" value="{{route("api.category.questions",['id'=>1])}}"/>
            </div>
            <button class="btn btn-primary col-12 no-radius test">{!!$loading!!} Test
            </button>
            <pre class="result"></pre>
        </div>

        <div class="input-group spc-inp">
            <div class="inp-header">Fetch 25 random questions from specific category</div>
            <div class="inp-group no-filter">
                <div class="input-group-header bdr">Method</div>
                <input disabled value="POST / GET"/>
            </div>
            <div class="inp-group no-filter">
                <div class="input-group-header">URL</div>
                <input role="url" value="{{route("api.category.questions.random",['id'=>1,'random'=>'random'])}}"/>
            </div>
            <button class="btn btn-primary col-12 no-radius test">{!!$loading!!} Test
            </button>
            <pre class="result"></pre>
        </div>

        <div class="input-group spc-inp">
            <div class="inp-header">Fetch 25 random questions from several categories</div>
            <div class="inp-group no-filter">
                <div class="input-group-header bdr">Method</div>
                <input disabled value="POST / GET"/>
            </div>
            <div class="inp-group no-filter">
                <div class="input-group-header bdr">URL</div>
                <input role="url" value="{{route("api.categories.questions")}}"/>
            </div>
            <div class="inp-group">
                <div class="input-group-header">Parameter</div>
                <div class="input-group-header simple" contenteditable="true" placeholder="categories" role="key">categories</div>
                <input role="value" value='[1,3,5]'/>
            </div>
            <button class="btn btn-primary col-12 no-radius test">{!!$loading!!} Test
            </button>
            <pre class="result"></pre>
        </div>





    </div>




<div class="container-fluid col-8" id="question">
    <h3>Question</h3>

    <div class="input-group spc-inp">
        <div class="inp-header">Fetch all questions</div>
        <div class="inp-group no-filter">
            <div class="input-group-header bdr">Method</div>
            <input disabled value="POST / GET"/>
        </div>
        <div class="inp-group no-filter">
            <div class="input-group-header">URL</div>
            <input role="url" value="{{route("api.questions.all")}}"/>
        </div>
        <button class="btn btn-primary col-12 no-radius test">{!!$loading!!} Test
        </button>
        <pre class="result"></pre>
    </div>

    <div class="input-group spc-inp">
        <div class="inp-header">Fetch all questions with sub questions</div>
        <div class="inp-group no-filter">
            <div class="input-group-header bdr">Method</div>
            <input disabled value="POST / GET"/>
        </div>
        <div class="inp-group no-filter">
            <div class="input-group-header">URL</div>
            <input role="url" value="{{route("api.questions.with_sub_questions",['with_sub_questions'=>'with_sub_questions'])}}"/>
        </div>
        <button class="btn btn-primary col-12 no-radius test">{!!$loading!!} Test
        </button>
        <pre class="result"></pre>
    </div>

    <div class="input-group spc-inp">
        <div class="inp-header">Fetch 25 random questions</div>
        <div class="inp-group no-filter">
            <div class="input-group-header bdr">Method</div>
            <input disabled value="POST / GET"/>
        </div>
        <div class="inp-group no-filter">
            <div class="input-group-header">URL</div>
            <input role="url" value="{{route("api.questions.random",['random'=>'random'])}}"/>
        </div>
        <button class="btn btn-primary col-12 no-radius test">{!!$loading!!} Test
        </button>
        <pre class="result"></pre>
    </div>

    <div class="input-group spc-inp">
        <div class="inp-header">Fetch 25 random questions with sub questions</div>
        <div class="inp-group no-filter">
            <div class="input-group-header bdr">Method</div>
            <input disabled value="POST / GET"/>
        </div>
        <div class="inp-group no-filter">
            <div class="input-group-header">URL</div>
            <input role="url" value="{{route("api.questions.random.with_sub_questions")}}"/>
        </div>
        <button class="btn btn-primary col-12 no-radius test">{!!$loading!!} Test
        </button>
        <pre class="result"></pre>
    </div>

    <div class="input-group spc-inp">
        <div class="inp-header">Fetch 1 specific question data</div>
        <div class="inp-group no-filter">
            <div class="input-group-header bdr">Method</div>
            <input disabled value="POST / GET"/>
        </div>
        <div class="inp-group no-filter">
            <div class="input-group-header">URL</div>
            <input role="url" value="{{route("api.question",['id'=>1])}}"/>
        </div>
        <button class="btn btn-primary col-12 no-radius test">{!!$loading!!} Test
        </button>
        <pre class="result"></pre>
    </div>

    <div class="input-group spc-inp">
        <div class="inp-header">Fetch all sub questions from 1 question</div>
        <div class="inp-group no-filter">
            <div class="input-group-header bdr">Method</div>
            <input disabled value="POST / GET"/>
        </div>
        <div class="inp-group no-filter">
            <div class="input-group-header">URL</div>
            <input role="url" value="{{route("api.sub_questions",['id'=>1,'sub_questions'=>'sub_questions'])}}"/>
        </div>
        <button class="btn btn-primary col-12 no-radius test">{!!$loading!!} Test
        </button>
        <pre class="result"></pre>
    </div>

</div>
@endsection


@section('css')
    <link rel="stylesheet" href="{{asset('general/css/docs.css')}}"/>
    <link rel="stylesheet" href="{{asset('general/css/loading.css')}}"/>
@endsection

@section('js')
    <script src="{{asset('general/js/docs.js')}}"></script>
@endsection



