<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <nav>
            <a href="/tasks">Tasks</a>
        </nav>
        <form action="/tasks" method="post">
            <h1>Add Task</h1>
            <div class="form-control">
                <label for="">Title</label>
                <input type="text" name="title">
            </div>
            <div class="form-control">
                <label for="">Jira Link</label>
                <input type="text" name="jira_link">
            </div>
            <div class="form-control">
                <label for="">Repo Link</label>
                <input type="text" name="repo_link">
            </div>
            <button>Add Task</button>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </body>
</html>
