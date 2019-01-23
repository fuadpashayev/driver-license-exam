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
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciO....",
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
  "id": 4,
  "name": "Test",
  "email": "test@app.com",
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI...",
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
  "email": "admin@app.com"
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
      "image_url": "https://drivertest.azweb/storage/image/vr9JekBSbfIw31Xxu5iTF5aqPSRSTPFMdOltvdnu.jpeg"
    },
    {
      "id": 2,
      "name": "nesciunt",
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "23.11.2018 07:08:05",
      "image_url": "https://drivertest.azweb"
    },
    {
      "id": 3,
      "name": "molestiae",
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "23.11.2018 07:08:05",
      "image_url": "https://drivertest.azweb"
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
      "image_url": "https://drivertest.azweb/storage/image/Uw6FNk5JmglyjCi7Pc4ySy16JyKgKVnf2vVPOo9s.jpeg",
      "audio_url": "https://drivertest.azwebhttps://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
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
          "audio_url": "https://drivertest.azwebhttps://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
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
          "audio_url": "https://drivertest.azweb/storage/audio/Xm8Jsy0XdAKvhcb5pVHxPkFc0NaE7Mfy4IuaASIv.mp3",
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
                <div class="input-group-header">URL</div>
                <input role="url" value="{{route("api.category.questions",['id'=>1,'order'=>1])}}"/>
            </div>
            <div class="inp-group">
                <div class="input-group-header">Parameter</div>
                <div class="input-group-header simple" contenteditable="true" placeholder="id" role="key">id</div>
                <input role="value" value='1'/>
            </div>
            <div class="inp-group">
                <div class="input-group-header">Parameter</div>
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
      "image_url": "https://drivertest.azweb/storage/image/Uw6FNk5JmglyjCi7Pc4ySy16JyKgKVnf2vVPOo9s.jpeg",
      "audio_url": "https://drivertest.azwebhttps://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
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
          "audio_url": "https://drivertest.azwebhttps://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
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
          "audio_url": "https://drivertest.azweb/storage/audio/Xm8Jsy0XdAKvhcb5pVHxPkFc0NaE7Mfy4IuaASIv.mp3",
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
      "image_url": "https://drivertest.azweb/storage/image/Uw6FNk5JmglyjCi7Pc4ySy16JyKgKVnf2vVPOo9s.jpeg",
      "audio_url": "https://drivertest.azwebhttps://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
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
          "audio_url": "https://drivertest.azwebhttps://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
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
          "audio_url": "https://drivertest.azweb/storage/audio/Xm8Jsy0XdAKvhcb5pVHxPkFc0NaE7Mfy4IuaASIv.mp3",
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
      "image_url": "/storage/image/Uw6FNk5JmglyjCi7Pc4ySy16JyKgKVnf2vVPOo9s.jpeg",
      "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
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
      "image_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_image_3.jpg",
      "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
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
      "image_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_image_3.jpg",
      "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
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
      "image_url": "https://drivertest.azweb/storage/image/Uw6FNk5JmglyjCi7Pc4ySy16JyKgKVnf2vVPOo9s.jpeg",
      "audio_url": "https://drivertest.azwebhttps://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
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
          "audio_url": "https://drivertest.azwebhttps://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
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
          "audio_url": "https://drivertest.azweb/storage/audio/Xm8Jsy0XdAKvhcb5pVHxPkFc0NaE7Mfy4IuaASIv.mp3",
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
      "image_url": "/storage/image/Uw6FNk5JmglyjCi7Pc4ySy16JyKgKVnf2vVPOo9s.jpeg",
      "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
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
      "image_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_image_3.jpg",
      "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
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
      "image_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_image_3.jpg",
      "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
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
      "image_url": "https://drivertest.azweb/storage/image/Uw6FNk5JmglyjCi7Pc4ySy16JyKgKVnf2vVPOo9s.jpeg",
      "audio_url": "https://drivertest.azwebhttps://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
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
          "audio_url": "https://drivertest.azwebhttps://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
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
          "audio_url": "https://drivertest.azweb/storage/audio/Xm8Jsy0XdAKvhcb5pVHxPkFc0NaE7Mfy4IuaASIv.mp3",
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
    "image_url": "https://drivertest.azweb/storage/image/Uw6FNk5JmglyjCi7Pc4ySy16JyKgKVnf2vVPOo9s.jpeg",
    "audio_url": "https://drivertest.azwebhttps://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
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
        "audio_url": "https://drivertest.azwebhttps://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
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
        "audio_url": "https://drivertest.azweb/storage/audio/Xm8Jsy0XdAKvhcb5pVHxPkFc0NaE7Mfy4IuaASIv.mp3",
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
      "image_url": "/storage/image/Uw6FNk5JmglyjCi7Pc4ySy16JyKgKVnf2vVPOo9s.jpeg",
      "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
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
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
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
          "audio_url": "/storage/audio/Xm8Jsy0XdAKvhcb5pVHxPkFc0NaE7Mfy4IuaASIv.mp3",
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
      "image_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_image_3.jpg",
      "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
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
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
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
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
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
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 5,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        }
      ]
    },
    {
      "id": 9,
      "category_id": 1,
      "text": "Quos dolore aut aut quisquam esse quia ut illum. Eum dolorum dolor unde asperiores tempore accusantium non. Eum quo voluptas natus animi. Sit voluptatem porro harum sequi.",
      "answer": null,
      "image_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_image_3.jpg",
      "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
      "user_id": 2,
      "parent_id": null,
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "23.11.2018 07:08:05",
      "sub_questions": [
        {
          "id": 10,
          "category_id": 1,
          "text": "Iure tenetur minima ut ut ut rerum qui. Fugiat soluta quia est porro molestiae. Quis laboriosam ut voluptatem consequatur. Voluptatem non aliquam non ut cupiditate cum autem.",
          "answer": 0,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 9,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        },
        {
          "id": 11,
          "category_id": 1,
          "text": "Cupiditate architecto dolor nostrum. Et expedita impedit ut fugiat et. Nemo nostrum ducimus enim qui cum ut sequi perferendis. Odit praesentium ut doloremque distinctio vero aut.",
          "answer": 1,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 9,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        },
        {
          "id": 12,
          "category_id": 1,
          "text": "Asperiores ipsa quo omnis ut illum quod placeat. Molestiae maiores autem facere soluta nihil culpa commodi. Aut distinctio aperiam eius quia. Est quia quaerat explicabo quam excepturi.",
          "answer": 1,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 9,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        }
      ]
    },
    {
      "id": 13,
      "category_id": 1,
      "text": "Nostrum omnis quis enim omnis voluptatem. Omnis alias sed ea ea ad et. Quibusdam eum deleniti exercitationem aut dolorum omnis earum. Voluptatem ullam est asperiores quo possimus quasi tempora.",
      "answer": null,
      "image_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_image_3.jpg",
      "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
      "user_id": 2,
      "parent_id": null,
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "23.11.2018 07:08:05",
      "sub_questions": [
        {
          "id": 14,
          "category_id": 1,
          "text": "Quia natus non est aut omnis accusamus unde. Saepe ut aut incidunt saepe quidem qui vel sit. Consectetur ut veniam dolor eos et atque et qui.",
          "answer": 1,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 13,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        },
        {
          "id": 15,
          "category_id": 1,
          "text": "Ad corporis voluptas nihil eos et qui nostrum. Architecto ut quia et quod voluptatem culpa. Laborum molestiae perferendis quia doloribus dolores laborum ipsum. Earum ex facilis nobis ex neque.",
          "answer": 0,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 13,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        },
        {
          "id": 16,
          "category_id": 1,
          "text": "Doloremque voluptatem debitis quidem exercitationem delectus. Rerum et ea et ut distinctio. Ut laudantium error magnam libero delectus dolor. Assumenda voluptatem et a eligendi.",
          "answer": 0,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 13,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        }
      ]
    },
    {
      "id": 17,
      "category_id": 1,
      "text": "Sint assumenda nisi dicta unde aut enim corporis. Reprehenderit impedit recusandae voluptatibus quaerat. Quis optio tempore a reprehenderit sit expedita optio.",
      "answer": null,
      "image_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_image_3.jpg",
      "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
      "user_id": 2,
      "parent_id": null,
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "23.11.2018 07:08:05",
      "sub_questions": [
        {
          "id": 18,
          "category_id": 1,
          "text": "Et animi impedit nemo aut qui. Soluta officiis fuga totam qui sunt. Sequi illum vero quod officia.",
          "answer": 0,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 17,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        },
        {
          "id": 19,
          "category_id": 1,
          "text": "Error delectus veniam qui non rerum et. Debitis expedita incidunt quod. Et eius eveniet sequi tenetur ut. Dolor nihil est sint itaque consequatur.",
          "answer": 0,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 17,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        },
        {
          "id": 20,
          "category_id": 1,
          "text": "Tenetur eum qui ipsam illo odio dolores commodi. A dolor vel modi aperiam harum repudiandae. Sunt minima sint saepe at aperiam qui odit tempora.",
          "answer": 1,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 17,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        }
      ]
    },
    {
      "id": 21,
      "category_id": 1,
      "text": "Laborum non sunt aut voluptate saepe rerum officiis maiores. Ipsam ad et numquam tempora. Quod est sunt nulla voluptatem ipsam velit perferendis. Molestiae dicta et dolor et eveniet sint.",
      "answer": null,
      "image_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_image_3.jpg",
      "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
      "user_id": 2,
      "parent_id": null,
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "23.11.2018 07:08:05",
      "sub_questions": [
        {
          "id": 22,
          "category_id": 1,
          "text": "Voluptatem dolore dolor eos dolores sit. Possimus amet voluptatum ipsum. Qui ut vero nihil qui exercitationem. Nesciunt sunt vitae sint iste deserunt.",
          "answer": 1,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 21,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        },
        {
          "id": 23,
          "category_id": 1,
          "text": "Ea possimus quas ea. Iusto veritatis id nulla quas fuga. Quia et enim vero voluptatem officiis expedita delectus. Velit iste nemo ratione corrupti dolorem numquam.",
          "answer": 1,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 21,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        },
        {
          "id": 24,
          "category_id": 1,
          "text": "Molestiae rem est ut ad eaque odit tenetur. Doloremque quam quis deserunt dolores. Consequuntur repellat asperiores illo laudantium. Suscipit minima maxime iste at veniam nobis.",
          "answer": 1,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 21,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        }
      ]
    },
    {
      "id": 25,
      "category_id": 2,
      "text": "Quo qui et incidunt iste veritatis. Ut sed eum architecto assumenda porro non sequi. Officia corporis veritatis libero molestiae rerum sed voluptas. Dolor voluptate rerum dolor est.",
      "answer": null,
      "image_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_image_3.jpg",
      "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
      "user_id": 2,
      "parent_id": null,
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "23.11.2018 07:08:05",
      "sub_questions": [
        {
          "id": 26,
          "category_id": 2,
          "text": "Ut aperiam reprehenderit natus doloribus. Et suscipit qui suscipit earum non. Distinctio corrupti possimus eum ea. Cumque libero aut labore ut molestiae et autem. Eaque architecto repellat aut esse.",
          "answer": 1,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 25,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        },
        {
          "id": 27,
          "category_id": 2,
          "text": "Aut dignissimos tempore sint quia saepe deserunt et. Labore maiores quo distinctio error enim. Ad sed aperiam ut quod asperiores. Quaerat illo a iure cumque.",
          "answer": 1,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 25,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        },
        {
          "id": 28,
          "category_id": 2,
          "text": "Eos occaecati adipisci laborum repellat distinctio voluptatem. Inventore odit tenetur quo odio. Est soluta architecto qui vitae eum. Tempore praesentium voluptatem ad sequi quia animi corporis.",
          "answer": 1,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 25,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        }
      ]
    },
    {
      "id": 29,
      "category_id": 2,
      "text": "Optio molestiae nisi aut sed praesentium modi. Error qui porro sequi et dolores laborum. Iste in et laborum soluta sed vel accusamus. Labore tempora necessitatibus illo quae voluptate aperiam et.",
      "answer": null,
      "image_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_image_3.jpg",
      "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
      "user_id": 2,
      "parent_id": null,
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "23.11.2018 07:08:05",
      "sub_questions": [
        {
          "id": 30,
          "category_id": 2,
          "text": "Autem ratione consectetur quis iusto. Incidunt nemo distinctio distinctio dolor sed cum assumenda. Et omnis reiciendis aut non eum. Aut ipsum cupiditate ipsa quo.",
          "answer": 1,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 29,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        },
        {
          "id": 31,
          "category_id": 2,
          "text": "Facere adipisci ut distinctio nobis. Aut saepe blanditiis distinctio debitis doloremque. Expedita qui reprehenderit ipsa ab sunt quaerat. Consequatur ipsam vitae ut est iure ut in.",
          "answer": 1,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 29,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        },
        {
          "id": 32,
          "category_id": 2,
          "text": "Quasi quae blanditiis fuga. Ut aliquid quaerat vel excepturi neque error. Maxime eligendi id suscipit et amet facilis quidem. Libero quasi occaecati voluptatem qui quo hic officiis.",
          "answer": 1,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 29,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        }
      ]
    },
    {
      "id": 33,
      "category_id": 2,
      "text": "Quia nam et iure quo quidem. Doloribus sint recusandae sint qui. Culpa earum dolor delectus voluptatem expedita voluptatem nemo ut. Illo dolor dolor optio rem dicta perferendis veritatis veniam.",
      "answer": null,
      "image_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_image_3.jpg",
      "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
      "user_id": 2,
      "parent_id": null,
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "23.11.2018 07:08:05",
      "sub_questions": [
        {
          "id": 34,
          "category_id": 2,
          "text": "Quod quasi modi blanditiis quam ut corporis. Delectus esse rerum deserunt repudiandae aut eius. Voluptas odio ipsa qui nam quisquam.",
          "answer": 0,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 33,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        },
        {
          "id": 35,
          "category_id": 2,
          "text": "Vero deserunt quia reiciendis dolorum ut porro. Soluta soluta quia corrupti eos. Deserunt consequatur architecto quia tempore et sunt repellat.",
          "answer": 0,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 33,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        },
        {
          "id": 36,
          "category_id": 2,
          "text": "Impedit enim quae esse itaque ducimus exercitationem. Delectus illum mollitia sit aut sed voluptas dolores nobis.",
          "answer": 1,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 33,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        }
      ]
    },
    {
      "id": 37,
      "category_id": 2,
      "text": "Consequatur exercitationem placeat iure. Quaerat quo inventore velit magnam mollitia. Officia delectus minus voluptates qui quam ut quaerat atque.",
      "answer": null,
      "image_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_image_3.jpg",
      "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
      "user_id": 2,
      "parent_id": null,
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "23.11.2018 07:08:05",
      "sub_questions": [
        {
          "id": 38,
          "category_id": 2,
          "text": "Fugiat id quaerat hic illum. Qui officiis sunt est aliquam debitis molestiae. Non nulla labore optio sunt. Eos quas quos possimus aspernatur eos ullam.",
          "answer": 1,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 37,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        },
        {
          "id": 39,
          "category_id": 2,
          "text": "Quae ipsam tenetur sed hic at ea at. Neque pariatur veniam impedit quos. Consequatur eligendi sint voluptas sit.",
          "answer": 1,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 37,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        },
        {
          "id": 40,
          "category_id": 2,
          "text": "Fuga qui et qui dolores sed. Non voluptas aut reprehenderit doloribus. Qui harum nesciunt incidunt cupiditate nesciunt. Vitae culpa voluptatem in natus atque.",
          "answer": 1,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 37,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        }
      ]
    },
    {
      "id": 41,
      "category_id": 2,
      "text": "Sequi saepe dolorem similique qui veniam. Aut dolor qui amet nostrum corrupti modi. Doloremque rerum deserunt porro vitae.",
      "answer": null,
      "image_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_image_3.jpg",
      "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
      "user_id": 2,
      "parent_id": null,
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "23.11.2018 07:08:05",
      "sub_questions": [
        {
          "id": 42,
          "category_id": 2,
          "text": "Non aut quidem excepturi molestiae quo quia aut earum. Illum iure aliquam voluptatem voluptatum eveniet quod. Et aut libero nam voluptas hic eum. Eaque rerum consequatur et dolorem accusamus.",
          "answer": 1,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 41,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        },
        {
          "id": 43,
          "category_id": 2,
          "text": "Eos et tempore autem labore quisquam minus veritatis. Eos atque dolores et consectetur perferendis perspiciatis. Sapiente natus ipsa harum repellat.",
          "answer": 1,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 41,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        },
        {
          "id": 44,
          "category_id": 2,
          "text": "Animi dolores illo molestiae quis libero. Minima voluptate earum officia voluptas. Quia earum cupiditate sapiente eum perferendis iusto.",
          "answer": 0,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 41,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        }
      ]
    },
    {
      "id": 45,
      "category_id": 2,
      "text": "Sequi officiis velit voluptatem. Maiores amet perspiciatis voluptatem quo. Ullam deserunt aut et vel tenetur exercitationem.",
      "answer": null,
      "image_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_image_3.jpg",
      "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
      "user_id": 2,
      "parent_id": null,
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "23.11.2018 07:08:05",
      "sub_questions": [
        {
          "id": 46,
          "category_id": 2,
          "text": "Natus debitis quibusdam exercitationem vel a repellat. Consectetur enim nisi quia quia sed omnis. Distinctio sed et a dolor voluptatem nihil et.",
          "answer": 1,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 45,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        },
        {
          "id": 47,
          "category_id": 2,
          "text": "Nihil laborum reiciendis ipsum aut necessitatibus veritatis eligendi. Velit quas voluptas quos exercitationem. Nam amet amet quis nulla doloremque.",
          "answer": 1,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 45,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        },
        {
          "id": 48,
          "category_id": 2,
          "text": "Nihil eos iusto aut officiis nemo fugit voluptas. Aut ipsum nisi dolorum aut ratione et sequi. Iusto ea nisi debitis atque aut nostrum eligendi.",
          "answer": 0,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 45,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        }
      ]
    },
    {
      "id": 49,
      "category_id": 3,
      "text": "Maiores reprehenderit deserunt quae eius corporis et doloremque. Consectetur adipisci expedita dolores maxime quisquam ut necessitatibus dolorem. In impedit eos velit ad rerum architecto.",
      "answer": null,
      "image_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_image_3.jpg",
      "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
      "user_id": 2,
      "parent_id": null,
      "created_at": "23.11.2018 07:08:05",
      "updated_at": "23.11.2018 07:08:05",
      "sub_questions": [
        {
          "id": 50,
          "category_id": 3,
          "text": "Debitis doloribus repellat rem itaque. Quisquam odio maxime tempora omnis dolore delectus. Vitae quis neque cupiditate quia sunt sed. Ducimus et exercitationem ut ipsum voluptatem enim qui.",
          "answer": 0,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 49,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        },
        {
          "id": 51,
          "category_id": 3,
          "text": "Soluta et sit aut possimus ad. Numquam nobis in odit. Voluptas excepturi et recusandae sed voluptas rem nobis. Odio quia quia explicabo et optio voluptatibus. Id culpa ea laudantium ex quo qui.",
          "answer": 1,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 49,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:05",
          "user_answer": null
        },
        {
          "id": 52,
          "category_id": 3,
          "text": "Laboriosam at quia provident omnis expedita. Dolorem quisquam molestias quia aut fugiat. Qui ut quis magni rerum consequatur amet.",
          "answer": 1,
          "image_url": null,
          "audio_url": "https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3",
          "user_id": 2,
          "parent_id": 49,
          "created_at": "23.11.2018 07:08:05",
          "updated_at": "23.11.2018 07:08:06",
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



