<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Job Posted</title>
    <style>
        /* Basic reset for email clients */
        body {
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        .header {
            background-color: #4CAF50;
            color: white;
            padding: 20px 30px;
            text-align: center;
        }

        .content {
            padding: 30px;
            color: #333;
        }

        .content h2 {
            margin-top: 0;
        }

        .job-card {
            background-color: #f9f9f9;
            border-left: 5px solid #4CAF50;
            padding: 15px 20px;
            margin: 20px 0;
        }

        .footer {
            padding: 20px 30px;
            background-color: #eee;
            text-align: center;
            font-size: 12px;
            color: #666;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white !important;
            text-decoration: none;
            border-radius: 4px;
        }

        @media only screen and (max-width: 600px) {
            .container {
                margin: 10px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>🚀 New Job Opportunity!</h1>
    </div>
    <div class="content">
        <h2>Hello {{ $user->name }},</h2>
        <p>A new job has just been posted that might interest you:</p>

        <div class="job-card">
            <h3>{{ $job->title }}</h3>
            <p><strong>Company:</strong> {{ $job->company_name }}</p>
            <p><strong>Location:</strong> {{ $job->location }}</p>
            <p><strong>Description:</strong> {{ Str::limit(strip_tags($job->description), 150, '...') }}</p>
        </div>

        <a href="{{ url('/jobs/'.$job->id) }}" class="btn">View Job Details</a>
    </div>

    <div class="footer">
        You're receiving this email because you're subscribed to job alerts.<br>
        If you no longer wish to receive these, you can <a href="{{ url('/unsubscribe') }}">unsubscribe here</a>.
    </div>
</div>

</body>
</html>
