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

$play = '<i class="material-icons test-play">play_arrow</i>';
@endphp
    <div class="container-fluid col-8" id="authentication">
        <h3>Authentication</h3>
        <div class="input-group spc-inp">
            <div class="inp-header">Login</div>
            <button class="inp-header-right test">{!!$loading!!} {!!$play!!} Test</button>
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

            <pre class="result"></pre>
            <div class="sample sample-success">
                <div class="sample-header">Success Example</div>
                <pre class="sample-result">
{
  "status": "success",
  "id": 1,
  "name": "Admin",
  "email": "admin@app.com",
  "payment_type": "free",
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIU...",
  "token_type": "bearer",
  "expires_in": 3600
}
                </pre>
            </div>
            <div class="sample sample-error">
                <div class="sample-header">Error Example</div>
                <pre class="sample-result">
{
  "status": "error",
  "error": "Unauthorized"
}
                </pre>
            </div>

        </div>

        <div class="input-group spc-inp">
            <div class="inp-header">Register</div>
            <button class="inp-header-right test">{!!$loading!!} {!!$play!!} Test</button>
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
            <pre class="result"></pre>
            <div class="sample sample-success">
                <div class="sample-header">Success Example</div>
                <pre class="sample-result">
{
  "status": "success",
  "id": 1,
  "name": "Admin",
  "email": "admin@app.com",
  "payment_type": "free",
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIU...",
  "token_type": "bearer",
  "expires_in": 3600
}
                </pre>
            </div>
            <div class="sample sample-error">
                <div class="sample-header">Error Example</div>
                <pre class="sample-result">
{
  "message": "The given data was invalid.",
  "errors": {
    "email": [
      "The email has already been taken."
    ]
  }
}
                </pre>
            </div>
        </div>

        <div class="input-group spc-inp">
            <div class="inp-header">Fetch profile data</div>
            <button class="inp-header-right test">{!!$loading!!} {!!$play!!} Test</button>
            <div class="inp-group no-filter">
                <div class="input-group-header bdr">Method</div>
                <input disabled value="POST / GET"/>
            </div>
            <div class="inp-group no-filter">
                <div class="input-group-header bdr">URL</div>
                <input role="url" value="{{route("api.profile")}}"/>
            </div>
            a
            <div class="inp-group">
                <div class="input-group-header">Header</div>
                <div class="input-group-header simple" contenteditable="true" placeholder="Header" role="key" type="header">Authorization</div>
                <input role="value" value="Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU0MjUzMjI5NywiZXhwIjoxNTQyNTM1ODk3LCJuYmYiOjE1NDI1MzIyOTcsImp0aSI6IjZkc3hJdFltYllaOVRrZmEiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.1zXUa6kXqXT8Vr-IWZSJCmIbdidW7zTakb1Y3dE2oLA"/>
            </div>
            <pre class="result"></pre>
            <div class="sample sample-success">
                <div class="sample-header">Success Example</div>
                <pre class="sample-result">
{
  "status": "success",
  "id": 1,
  "name": "Admin",
  "email": "admin@app.com",
  "payment_type": "free"
}
                </pre>
            </div>
            <div class="sample sample-error">
                <div class="sample-header">Error Example</div>
                <pre class="sample-result">
{
  "message": "Unauthenticated."
}
                </pre>
            </div>
        </div>

        <div class="input-group spc-inp">
            <div class="inp-header">Logout</div>
            <button class="inp-header-right test">{!!$loading!!} {!!$play!!} Test</button>
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
            <pre class="result"></pre>
            <div class="sample sample-success">
                <div class="sample-header">Success Example</div>
                <pre class="sample-result">
{
  "status": "success",
  "message": "Successfully logged out"
}
                </pre>
            </div>
            <div class="sample sample-error">
                <div class="sample-header">Error Example</div>
                <pre class="sample-result">
{
  "message": "Unauthenticated."
}
                </pre>
            </div>
        </div>



    </div>







    <div class="container-fluid col-8" id="category">
        <h3>Category</h3>
        <div class="input-group spc-inp">
            <div class="inp-header">Fetch all categories</div>
            <button class="inp-header-right test">{!!$loading!!} {!!$play!!} Test</button>
            <div class="inp-group no-filter">
                <div class="input-group-header bdr">Method</div>
                <input disabled value="POST / GET"/>
            </div>
            <div class="inp-group no-filter">
                <div class="input-group-header">URL</div>
                <input role="url" value="{{route("api.categories.all")}}"/>
            </div>
            <pre class="result"></pre>
            <div class="sample sample-success">
                <div class="sample-header">Success Example</div>
                <pre class="sample-result">
{
  "status": "success",
  "categories": [
    {
      "id": 1,
      "name": "delectuss",
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "18.01.2019 08:00:16",
      "image_url": "http://test.azweb.dk/storage/image/WzfIiIkTFEcqoIWP4OwPQtFIWmimzHymAO3J5AU7.jpeg"
    },
    {
      "id": 2,
      "name": "nesciunt",
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "23.11.2018 07:08:05",
      "image_url": "http://test.azweb.dk/storage/image/WzfIiIkTFEcqoIWP4OwPQtFIWmimzHymAO3J5AU7.jpeg"
    },
    {
      "id": 3,
      "name": "molestiae",
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "23.11.2018 07:08:05",
      "image_url": "http://test.azweb.dk/storage/image/WzfIiIkTFEcqoIWP4OwPQtFIWmimzHymAO3J5AU7.jpeg"
    },
  ]
}
                </pre>
            </div>
            <div class="sample sample-error">
                <div class="sample-header">Error Example</div>
                <pre class="sample-result">
{
  "status": "error",
  "categories": []
}
                </pre>
            </div>
        </div>

        <div class="input-group spc-inp">
            <div class="inp-header">Fetch 25 questions from specific category</div>
            <button class="inp-header-right test">{!!$loading!!} {!!$play!!} Test</button>
            <div class="inp-group no-filter">
                <div class="input-group-header bdr">Method</div>
                <input disabled value="POST / GET"/>
            </div>
            <div class="inp-group no-filter">
                <div class="input-group-header">URL</div>
                <input role="url" value="{{route("api.category.questions",['id'=>1])}}"/>
            </div>
            <pre class="result"></pre>
            <div class="sample sample-success">
                <div class="sample-header">Success Example</div>
                <pre class="sample-result">
{
  "status": "success",
  "questions": [
    {
      "id": 1,
      "category_id": 1,
      "text": "Nihil delectus libero deleniti accusamus. Id eum repellendus nisi et. Vitae in et perferendis quasi doloremque consectetur deleniti. Ullam vel et est velit voluptas quia.",
      "answer": null,
      "image_url": "http://test.azweb.dk/storage/image/WzfIiIkTFEcqoIWP4OwPQtFIWmimzHymAO3J5AU7.jpeg",
      "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
      "user_id": 1,
      "parent_id": null,
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "26.11.2018 14:23:23",
      "sub_questions": [
        {
          "id": 2,
          "category_id": 1,
          "text": "Enim a vel consequatur blanditiis ut. Consequatur dignissimos repellendus nobis porro. Odio exercitationem nihil natus.",
          "answer": 1,
          "image_url": null,
          "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
          "user_id": 1,
          "parent_id": 1,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "26.11.2018 13:59:11"
        },
        {
          "id": 121,
          "category_id": 1,
          "text": "test",
          "answer": 1,
          "image_url": null,
          "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
          "user_id": 1,
          "parent_id": 1,
          "created_at": "26.11.2018 13:59:11",
          "updated_at": "26.11.2018 13:59:11"
        }
      ]
    }
  ]
}
                </pre>
            </div>
            <div class="sample sample-error">
                <div class="sample-header">Error Example</div>
                <pre class="sample-result">
{
  "status": "error",
  "questions": []
}
                </pre>
            </div>
        </div>

        <div class="input-group spc-inp">
            <div class="inp-header">Fetch question with order number from specific category</div>
            <button class="inp-header-right test">{!!$loading!!} {!!$play!!} Test</button>
            <div class="inp-group no-filter">
                <div class="input-group-header bdr">Method</div>
                <input disabled value="POST / GET"/>
            </div>
            <div class="inp-group no-filter">
                <div class="input-group-header bdr">URL</div>
                <input role="url" value="{{route("api.category.questions")}}"/>
            </div>
            <div class="inp-group">
                <div class="input-group-header bdr">Parameter</div>
                <div class="input-group-header simple" contenteditable="true" placeholder="id" role="key">id</div>
                <input role="value" value='1'/>
            </div>
            <div class="inp-group">
                <div class="input-group-header bdr">Parameter</div>
                <div class="input-group-header simple" contenteditable="true" placeholder="order" role="key">order</div>
                <input role="value" value='1'/>
            </div>
            <pre class="result"></pre>
            <div class="sample sample-success">
                <div class="sample-header">Success Example</div>
                <pre class="sample-result">
{
  "status": "success",
  "questions": [
    {
      "id": 1,
      "category_id": 1,
      "text": "Nihil delectus libero deleniti accusamus. Id eum repellendus nisi et. Vitae in et perferendis quasi doloremque consectetur deleniti. Ullam vel et est velit voluptas quia.",
      "answer": null,
      "image_url": "http://test.azweb.dk/storage/image/Uw6FNk5JmglyjCi7Pc4ySy16JyKgKVnf2vVPOo9s.jpeg",
      "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
      "user_id": 1,
      "parent_id": null,
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "26.11.2018 14:23:23",
      "sub_questions": [
        {
          "id": 2,
          "category_id": 1,
          "text": "Enim a vel consequatur blanditiis ut. Consequatur dignissimos repellendus nobis porro. Odio exercitationem nihil natus.",
          "answer": 1,
          "image_url": null,
          "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
          "user_id": 1,
          "parent_id": 1,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "26.11.2018 13:59:11"
        },
        {
          "id": 121,
          "category_id": 1,
          "text": "test",
          "answer": 1,
          "image_url": null,
          "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
          "user_id": 1,
          "parent_id": 1,
          "created_at": "26.11.2018 13:59:11",
          "updated_at": "26.11.2018 13:59:11"
        }
      ]
    }
  ]
}
                </pre>
            </div>
            <div class="sample sample-error">
                <div class="sample-header">Error Example</div>
                <pre class="sample-result">
{
  "status": "error",
  "questions": []
}
                </pre>
            </div>
        </div>

        <div class="input-group spc-inp">
            <div class="inp-header">Fetch 25 random questions from several categories</div>
            <button class="inp-header-right test">{!!$loading!!} {!!$play!!} Test</button>
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
            <pre class="result"></pre>
            <div class="sample sample-success">
                <div class="sample-header">Success Example</div>
                <pre class="sample-result">
{
  "status": "success",
  "questions": [
    {
      "id": 1,
      "category_id": 1,
      "text": "Nihil delectus libero deleniti accusamus. Id eum repellendus nisi et. Vitae in et perferendis quasi doloremque consectetur deleniti. Ullam vel et est velit voluptas quia.",
      "answer": null,
      "image_url": "http://test.azweb.dk/storage/image/WzfIiIkTFEcqoIWP4OwPQtFIWmimzHymAO3J5AU7.jpeg"
      "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
      "user_id": 1,
      "parent_id": null,
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "26.11.2018 14:23:23",
      "sub_questions": [
        {
          "id": 2,
          "category_id": 1,
          "text": "Enim a vel consequatur blanditiis ut. Consequatur dignissimos repellendus nobis porro. Odio exercitationem nihil natus.",
          "answer": 1,
          "image_url": null,
          "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
          "user_id": 1,
          "parent_id": 1,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "26.11.2018 13:59:11"
        },
        {
          "id": 121,
          "category_id": 1,
          "text": "test",
          "answer": 1,
          "image_url": null,
          "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
          "user_id": 1,
          "parent_id": 1,
          "created_at": "26.11.2018 13:59:11",
          "updated_at": "26.11.2018 13:59:11"
        }
      ]
    }
  ]
}
                </pre>
            </div>
            <div class="sample sample-error">
                <div class="sample-header">Error Example</div>
                <pre class="sample-result">
{
  "status": "error",
  "questions": []
}
                </pre>
            </div>
        </div>





    </div>




<div class="container-fluid col-8" id="question">
    <h3>Question</h3>

    <div class="input-group spc-inp">
        <div class="inp-header">Fetch all questions</div>
        <button class="inp-header-right test">{!!$loading!!} {!!$play!!} Test</button>
        <div class="inp-group no-filter">
            <div class="input-group-header bdr">Method</div>
            <input disabled value="POST / GET"/>
        </div>
        <div class="inp-group no-filter">
            <div class="input-group-header">URL</div>
            <input role="url" value="{{route("api.questions.all")}}"/>
        </div>
        <pre class="result"></pre>
        <div class="sample sample-success">
            <div class="sample-header">Success Example</div>
            <pre class="sample-result">
{
  "status": "success",
  "questions": [
    {
      "id": 1,
      "category_id": 1,
      "text": "Nihil delectus libero deleniti accusamus. Id eum repellendus nisi et. Vitae in et perferendis quasi doloremque consectetur deleniti. Ullam vel et est velit voluptas quia.",
      "answer": null,
      "image_url": "http://test.azweb.dk/storage/image/WzfIiIkTFEcqoIWP4OwPQtFIWmimzHymAO3J5AU7.jpeg"
      "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
      "user_id": 1,
      "parent_id": null,
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "26.11.2018 14:23:23"
    },
    {
      "id": 5,
      "category_id": 1,
      "text": "Dolorem voluptatibus tenetur non. Minus ut ut est id rerum accusantium eos et. Vitae aut qui voluptatem adipisci voluptatum.",
      "answer": null,
      "image_url": "http://test.azweb.dk/storage/image/WzfIiIkTFEcqoIWP4OwPQtFIWmimzHymAO3J5AU7.jpeg"
      "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
      "user_id": 2,
      "parent_id": null,
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "23.11.2018 07:08:05"
    },
    {
      "id": 9,
      "category_id": 1,
      "text": "Quos dolore aut aut quisquam esse quia ut illum. Eum dolorum dolor unde asperiores tempore accusantium non. Eum quo voluptas natus animi. Sit voluptatem porro harum sequi.",
      "answer": null,
      "image_url": "http://test.azweb.dk/storage/image/WzfIiIkTFEcqoIWP4OwPQtFIWmimzHymAO3J5AU7.jpeg"
      "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
      "user_id": 2,
      "parent_id": null,
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "23.11.2018 07:08:05"
    },
  ]
}
                </pre>
        </div>
        <div class="sample sample-error">
            <div class="sample-header">Error Example</div>
            <pre class="sample-result">
{
  "status": "error",
  "questions": []
}
                </pre>
        </div>
    </div>

    <div class="input-group spc-inp">
        <div class="inp-header">Fetch all questions with sub questions</div>
        <button class="inp-header-right test">{!!$loading!!} {!!$play!!} Test</button>
        <div class="inp-group no-filter">
            <div class="input-group-header bdr">Method</div>
            <input disabled value="POST / GET"/>
        </div>
        <div class="inp-group no-filter">
            <div class="input-group-header">URL</div>
            <input role="url" value="{{route("api.questions.with_sub_questions",['with_sub_questions'=>'with_sub_questions'])}}"/>
        </div>
        <pre class="result"></pre>
        <div class="sample sample-success">
            <div class="sample-header">Success Example</div>
            <pre class="sample-result">
{
  "status": "success",
  "questions": [
    {
      "id": 1,
      "category_id": 1,
      "text": "Nihil delectus libero deleniti accusamus. Id eum repellendus nisi et. Vitae in et perferendis quasi doloremque consectetur deleniti. Ullam vel et est velit voluptas quia.",
      "answer": null,
      "image_url": "http://test.azweb.dk/storage/image/WzfIiIkTFEcqoIWP4OwPQtFIWmimzHymAO3J5AU7.jpeg"
      "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
      "user_id": 1,
      "parent_id": null,
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "26.11.2018 14:23:23",
      "sub_questions": [
        {
          "id": 2,
          "category_id": 1,
          "text": "Enim a vel consequatur blanditiis ut. Consequatur dignissimos repellendus nobis porro. Odio exercitationem nihil natus.",
          "answer": 1,
          "image_url": null,
          "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
          "user_id": 1,
          "parent_id": 1,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "26.11.2018 13:59:11"
        },
        {
          "id": 121,
          "category_id": 1,
          "text": "test",
          "answer": 1,
          "image_url": null,
          "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
          "user_id": 1,
          "parent_id": 1,
          "created_at": "26.11.2018 13:59:11",
          "updated_at": "26.11.2018 13:59:11"
        }
      ]
    }
  ]
}
                </pre>
        </div>
        <div class="sample sample-error">
            <div class="sample-header">Error Example</div>
            <pre class="sample-result">
{
  "status": "error",
  "questions": []
}
                </pre>
        </div>
    </div>

    <div class="input-group spc-inp">
        <div class="inp-header">Fetch 25 random questions</div>
        <button class="inp-header-right test">{!!$loading!!} {!!$play!!} Test</button>
        <div class="inp-group no-filter">
            <div class="input-group-header bdr">Method</div>
            <input disabled value="POST / GET"/>
        </div>
        <div class="inp-group no-filter">
            <div class="input-group-header">URL</div>
            <input role="url" value="{{route("api.questions.random",['random'=>'random'])}}"/>
        </div>
        <pre class="result"></pre>
        <div class="sample sample-success">
            <div class="sample-header">Success Example</div>
            <pre class="sample-result">
{
  "status": "success",
  "questions": [
    {
      "id": 1,
      "category_id": 1,
      "text": "Nihil delectus libero deleniti accusamus. Id eum repellendus nisi et. Vitae in et perferendis quasi doloremque consectetur deleniti. Ullam vel et est velit voluptas quia.",
      "answer": null,
      "image_url": "http://test.azweb.dk/storage/image/WzfIiIkTFEcqoIWP4OwPQtFIWmimzHymAO3J5AU7.jpeg"
      "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
      "user_id": 1,
      "parent_id": null,
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "26.11.2018 14:23:23"
    },
    {
      "id": 5,
      "category_id": 1,
      "text": "Dolorem voluptatibus tenetur non. Minus ut ut est id rerum accusantium eos et. Vitae aut qui voluptatem adipisci voluptatum.",
      "answer": null,
      "image_url": "http://test.azweb.dk/storage/image/WzfIiIkTFEcqoIWP4OwPQtFIWmimzHymAO3J5AU7.jpeg"
      "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
      "user_id": 2,
      "parent_id": null,
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "23.11.2018 07:08:05"
    },
    {
      "id": 9,
      "category_id": 1,
      "text": "Quos dolore aut aut quisquam esse quia ut illum. Eum dolorum dolor unde asperiores tempore accusantium non. Eum quo voluptas natus animi. Sit voluptatem porro harum sequi.",
      "answer": null,
      "image_url": "http://test.azweb.dk/storage/image/WzfIiIkTFEcqoIWP4OwPQtFIWmimzHymAO3J5AU7.jpeg"
      "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
      "user_id": 2,
      "parent_id": null,
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "23.11.2018 07:08:05"
    },
  ]
}
                </pre>
        </div>
        <div class="sample sample-error">
            <div class="sample-header">Error Example</div>
            <pre class="sample-result">
{
  "status": "error",
  "questions": []
}
                </pre>
        </div>
    </div>

    <div class="input-group spc-inp">
        <div class="inp-header">Fetch 25 random questions with sub questions</div>
        <button class="inp-header-right test">{!!$loading!!} {!!$play!!} Test</button>
        <div class="inp-group no-filter">
            <div class="input-group-header bdr">Method</div>
            <input disabled value="POST / GET"/>
        </div>
        <div class="inp-group no-filter">
            <div class="input-group-header">URL</div>
            <input role="url" value="{{route("api.questions.random.with_sub_questions")}}"/>
        </div>
        <pre class="result"></pre>
        <div class="sample sample-success">
            <div class="sample-header">Success Example</div>
            <pre class="sample-result">
{
  "status": "success",
  "questions": [
    {
      "id": 1,
      "category_id": 1,
      "text": "Nihil delectus libero deleniti accusamus. Id eum repellendus nisi et. Vitae in et perferendis quasi doloremque consectetur deleniti. Ullam vel et est velit voluptas quia.",
      "answer": null,
      "image_url": "http://test.azweb.dk/storage/image/WzfIiIkTFEcqoIWP4OwPQtFIWmimzHymAO3J5AU7.jpeg"
      "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
      "user_id": 1,
      "parent_id": null,
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "26.11.2018 14:23:23",
      "sub_questions": [
        {
          "id": 2,
          "category_id": 1,
          "text": "Enim a vel consequatur blanditiis ut. Consequatur dignissimos repellendus nobis porro. Odio exercitationem nihil natus.",
          "answer": 1,
          "image_url": null,
          "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
          "user_id": 1,
          "parent_id": 1,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "26.11.2018 13:59:11"
        },
        {
          "id": 121,
          "category_id": 1,
          "text": "test",
          "answer": 1,
          "image_url": null,
          "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
          "user_id": 1,
          "parent_id": 1,
          "created_at": "26.11.2018 13:59:11",
          "updated_at": "26.11.2018 13:59:11"
        }
      ]
    }
  ]
}
                </pre>
        </div>
        <div class="sample sample-error">
            <div class="sample-header">Error Example</div>
            <pre class="sample-result">
{
  "status": "error",
  "questions": []
}
                </pre>
        </div>
    </div>

    <div class="input-group spc-inp">
        <div class="inp-header">Fetch 1 specific question data</div>
        <button class="inp-header-right test">{!!$loading!!} {!!$play!!} Test</button>
        <div class="inp-group no-filter">
            <div class="input-group-header bdr">Method</div>
            <input disabled value="POST / GET"/>
        </div>
        <div class="inp-group no-filter">
            <div class="input-group-header">URL</div>
            <input role="url" value="{{route("api.question",['id'=>1])}}"/>
        </div>
        <pre class="result"></pre>
        <div class="sample sample-success">
            <div class="sample-header">Success Example</div>
            <pre class="sample-result">
{
  "status": "success",
  "question": {
    "id": 1,
    "category_id": 1,
    "text": "Nihil delectus libero deleniti accusamus. Id eum repellendus nisi et. Vitae in et perferendis quasi doloremque consectetur deleniti. Ullam vel et est velit voluptas quia.",
    "answer": null,
    "image_url": "http://test.azweb.dk/storage/image/WzfIiIkTFEcqoIWP4OwPQtFIWmimzHymAO3J5AU7.jpeg"
    "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
    "user_id": 1,
    "parent_id": null,
    "created_at": "23.11.2018 07:08:05",
    "updated_at": "26.11.2018 14:23:23",
    "sub_questions": [
      {
        "id": 2,
        "category_id": 1,
        "text": "Enim a vel consequatur blanditiis ut. Consequatur dignissimos repellendus nobis porro. Odio exercitationem nihil natus.",
        "answer": 1,
        "image_url": null,
        "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
        "user_id": 1,
        "parent_id": 1,
        "created_at": "23.11.2018 07:08:05",
        "updated_at": "26.11.2018 13:59:11"
      },
      {
        "id": 121,
        "category_id": 1,
        "text": "test",
        "answer": 1,
        "image_url": null,
        "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
        "user_id": 1,
        "parent_id": 1,
        "created_at": "26.11.2018 13:59:11",
        "updated_at": "26.11.2018 13:59:11"
      }
    ]
  }
}
                </pre>
        </div>
        <div class="sample sample-error">
            <div class="sample-header">Error Example</div>
            <pre class="sample-result">
{
  "status": "error",
  "question": {}
}
                </pre>
        </div>
    </div>


</div>

<div class="container-fluid col-8" id="answers">
    <h3>Answers</h3>

    <div class="input-group spc-inp">
        <div class="inp-header">Send Answers</div>
        <button class="inp-header-right test">{!!$loading!!} {!!$play!!} Test</button>
        <div class="inp-group no-filter">
            <div class="input-group-header bdr">Method</div>
            <input disabled value="POST "/>
        </div>
        <div class="inp-group no-filter">
            <div class="input-group-header bdr">URL</div>
            <input role="url" value="{{route("api.answer")}}"/>
        </div>
        <div class="inp-group">
            <div class="input-group-header bdr">Parameter</div>
            <div class="input-group-header simple" contenteditable="true" placeholder="user_id" role="key">user_id | device_id</div>
            <input role="value" value='1'/>
        </div>
        <div class="inp-group">
            <div class="input-group-header bdr">Parameter</div>
            <div class="input-group-header simple" contenteditable="true" placeholder="session_id" role="key">session_id</div>
            <input role="value" value='7xzt2l85sflmn42'/>
        </div>
        <div class="inp-group">
            <div class="input-group-header bdr">Parameter</div>
            <div class="input-group-header simple" contenteditable="true" placeholder="question_list" role="key">question_list</div>
            <input role="value" value='[1,5,9,13,17,21,25,29,33,37,41,45,49]'/>
        </div>
        <div class="inp-group">
            <div class="input-group-header bdr">Parameter</div>
            <div class="input-group-header simple" contenteditable="true" placeholder="answers" role="key">answers</div>
            <input role="value" value='{"2":0,"3":1,"4":1,"6":0,"7":1,"8":1}'/>
        </div>
        <pre class="result"></pre>
        <div class="sample sample-success">
            <div class="sample-header">Success Example</div>
            <pre class="sample-result">
{
  "status": "success",
  "message": "Answers are sended to database successfully",
  "results": {
    "6": false,
    "7": false,
    "8": false
  }
}
                </pre>
        </div>
        <div class="sample sample-error">
            <div class="sample-header">Error Example</div>
            <pre class="sample-result">
{
  "status": "error",
  "message": "These answers exist on database",
  "results": []
}
                </pre>
        </div>
    </div>

    <div class="input-group spc-inp">
        <div class="inp-header">Get Statistics</div>
        <button class="inp-header-right test">{!!$loading!!} {!!$play!!} Test</button>
        <div class="inp-group no-filter">
            <div class="input-group-header bdr">Method</div>
            <input disabled value="POST "/>
        </div>
        <div class="inp-group no-filter">
            <div class="input-group-header bdr">URL</div>
            <input role="url" value="{{route("api.statistics")}}"/>
        </div>
        <div class="inp-group">
            <div class="input-group-header bdr">Parameter</div>
            <div class="input-group-header simple" contenteditable="true" placeholder="user_id" role="key">user_id | device_id</div>
            <input role="value" value='1'/>
        </div>
        <pre class="result"></pre>
        <div class="sample sample-success">
            <div class="sample-header">Success Example</div>
            <pre class="sample-result">
{
  "status": "successful",
  "results": {
    "7xzt2l85sflmn42": [
      {
        "question_id": 2,
        "session_id": "7xzt2l85sflmn42",
        "answer": 0,
        "correct_answer": 1,
        "time": "18.01.2019 13:22:14",
        "timestamp": 1547817734
      },
      {
        "question_id": 2,
        "session_id": "7xzt2l85sflmn42",
        "answer": 0,
        "correct_answer": 1,
        "time": "18.01.2019 13:23:18",
        "timestamp": 1547817798
      },
      {
        "question_id": 6,
        "session_id": "7xzt2l85sflmn42",
        "answer": 0,
        "correct_answer": 1,
        "time": "18.01.2019 13:30:38",
        "timestamp": 1547818238
      },
      {
        "question_id": 7,
        "session_id": "7xzt2l85sflmn42",
        "answer": 1,
        "correct_answer": 0,
        "time": "18.01.2019 13:30:38",
        "timestamp": 1547818238
      },
      {
        "question_id": 8,
        "session_id": "7xzt2l85sflmn42",
        "answer": 0,
        "correct_answer": 1,
        "time": "18.01.2019 13:30:38",
        "timestamp": 1547818238
      }
    ]
  }
}
                </pre>
        </div>
        <div class="sample sample-error">
            <div class="sample-header">Error Example</div>
            <pre class="sample-result">
{
  "status": "error",
  "results": []
}
                </pre>
        </div>
    </div>


    <div class="input-group spc-inp">
        <div class="inp-header">Get statistics with questions and sub questions</div>
        <button class="inp-header-right test">{!!$loading!!} {!!$play!!} Test</button>
        <div class="inp-group no-filter">
            <div class="input-group-header bdr">Method</div>
            <input disabled value="POST "/>
        </div>
        <div class="inp-group no-filter">
            <div class="input-group-header bdr">URL</div>
            <input role="url" value="{{route("api.statistics.session")}}"/>
        </div>
        <div class="inp-group">
            <div class="input-group-header bdr">Parameter</div>
            <div class="input-group-header simple" contenteditable="true" placeholder="user_id" role="key">user_id | device_id</div>
            <input role="value" value='1'/>
        </div>
        <div class="inp-group">
            <div class="input-group-header bdr">Parameter</div>
            <div class="input-group-header simple" contenteditable="true" placeholder="session_id" role="key">session_id</div>
            <input role="value" value='7xzt2l85sflmn42'/>
        </div>
        <pre class="result"></pre>
        <div class="sample sample-success">
            <div class="sample-header">Success Example</div>
            <pre class="sample-result">
{
  "status": "successful",
  "results": [
    {
      "id": 1,
      "category_id": 1,
      "text": "Nihil delectus libero deleniti accusamus. Id eum repellendus nisi et. Vitae in et perferendis quasi doloremque consectetur deleniti. Ullam vel et est velit voluptas quia.",
      "answer": null,
      "image_url": "http://test.azweb.dk/storage/image/WzfIiIkTFEcqoIWP4OwPQtFIWmimzHymAO3J5AU7.jpeg"
      "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
      "user_id": 1,
      "parent_id": null,
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "26.11.2018 14:23:23",
      "sub_questions": [
        {
          "id": 2,
          "category_id": 1,
          "text": "Enim a vel consequatur blanditiis ut. Consequatur dignissimos repellendus nobis porro. Odio exercitationem nihil natus.",
          "answer": 1,
          "image_url": null,
          "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
          "user_id": 1,
          "parent_id": 1,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "26.11.2018 13:59:11",
          "user_answer": 0
        },
        {
          "id": 121,
          "category_id": 1,
          "text": "test",
          "answer": 1,
          "image_url": null,
          "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
          "user_id": 1,
          "parent_id": 1,
          "created_at": "26.11.2018 13:59:11",
          "updated_at": "26.11.2018 13:59:11",
          "user_answer": null
        }
      ]
    },
    {
      "id": 5,
      "category_id": 1,
      "text": "Dolorem voluptatibus tenetur non. Minus ut ut est id rerum accusantium eos et. Vitae aut qui voluptatem adipisci voluptatum.",
      "answer": null,
      "image_url": "http://test.azweb.dk/storage/image/WzfIiIkTFEcqoIWP4OwPQtFIWmimzHymAO3J5AU7.jpeg"
      "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
      "user_id": 2,
      "parent_id": null,
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "23.11.2018 07:08:05",
      "sub_questions": [
        {
          "id": 6,
          "category_id": 1,
          "text": "Ut modi commodi corporis esse. Qui quod dolores harum aut. Officia nobis optio praesentium non voluptas ex quo ipsam.",
          "answer": 1,
          "image_url": null,
          "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
          "user_id": 2,
          "parent_id": 5,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        },
        {
          "id": 7,
          "category_id": 1,
          "text": "Sunt et explicabo temporibus quia. Dolores perferendis quis molestiae.",
          "answer": 0,
          "image_url": null,
          "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
          "user_id": 2,
          "parent_id": 5,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        },
        {
          "id": 8,
          "category_id": 1,
          "text": "Velit repellat deleniti aut harum. Consequatur facere blanditiis ratione qui id. In sint molestias voluptatem dolore quaerat natus dolore.",
          "answer": 1,
          "image_url": null,
          "audio_url": "http://test.azweb.dk/storage/audio/MfIdzNe8laCh0JnIVNYIyXte3DEY717vFJYRC6pd.mpga",
          "user_id": 2,
          "parent_id": 5,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        }
      ]
    }
  ]
}
                </pre>
        </div>
        <div class="sample sample-error">
            <div class="sample-header">Error Example</div>
            <pre class="sample-result">
{
  "status": "error",
  "results": []
}
                </pre>
        </div>
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



