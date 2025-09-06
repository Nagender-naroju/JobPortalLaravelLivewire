<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Post Confirmation</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 30px;
        }
        .content h2 {
            color: #333333;
        }
        .content p {
            line-height: 1.6;
            color: #555555;
        }
        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 24px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .footer {
            padding: 20px;
            text-align: center;
            font-size: 13px;
            color: #999999;
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Thank You!</h1>
        </div>
        <div class="content">
            <h2>Job Post Successfully Submitted</h2>
            <p>Hi {{ $postedUser->name }},</p>
            <p>Thank you for submitting a new job post to our platform. We’ve received the following job details:</p>

            <ul>
                <li><strong>Title:</strong> {{ $jobDetails->title }}</li>
                <li><strong>Company:</strong> {{ $jobDetails->company_name }}</li>
                <li><strong>Location:</strong> {{ $jobDetails->location }}</li>
                <li><strong>Type:</strong> {{ $jobDetails->jobType->name ?? 'N/A' }}</li>
            </ul>

            <p>We will review your job listing and publish it shortly if it meets our guidelines.</p>

            <a href="{{ url('/jobs/' . $jobDetails->id) }}" class="button">View Your Job Post</a>

            <p>If you have any questions or need assistance, feel free to contact us.</p>

            <p>Best regards,<br>The {{ config('app.name') }} Team</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</body>
</html>
