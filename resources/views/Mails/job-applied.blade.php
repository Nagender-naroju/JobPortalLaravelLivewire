<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Received - Job Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
        }
        
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #007bff;
        }
        
        .success-icon {
            font-size: 48px;
            color: #28a745;
            margin-bottom: 10px;
        }
        
        h1 {
            color: #007bff;
            margin: 0;
            font-size: 24px;
        }
        
        .greeting {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }
        
        .highlight {
            color: #007bff;
        }
        
        .content {
            margin: 20px 0;
        }
        
        .info-box {
            background: #f8f9fa;
            padding: 20px;
            border-left: 4px solid #007bff;
            margin: 20px 0;
        }
        
        .info-title {
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
        
        ul {
            margin: 10px 0;
            padding-left: 20px;
        }
        
        li {
            margin: 8px 0;
            color: #555;
        }
        
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            color: #666;
            font-size: 14px;
        }
        
        .cta-button {
            display: inline-block;
            background: #007bff;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 5px;
            margin: 15px 0;
        }
        
        .cta-button:hover {
            background: #0056b3;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="success-icon">✅</div>
            <h1>Application Received!</h1>
        </div>
        
        <div class="greeting">
            Hi <span class="highlight">{{$user->name}}</span>!
        </div>
        
        <div class="content">
            <p>Thank you for applying through our Job Portal. Your application has been successfully submitted and is now being reviewed by our team.</p>
            
            <div class="info-box">
                <div class="info-title">🎯 You Applied For:</div>
                <p><strong>{{$jobData->title}}</strong></p>
                <p>Company: {{$jobData->company_name ?? 'N/A'}}</p>
                <p>Location: {{$jobData->location ?? 'N/A'}}</p>
                <p>Applied on: {{date('F j, Y')}}</p>
            </div>
            
            <div class="info-box">
                <div class="info-title">📋 What's Next?</div>
                <ul>
                    <li>We'll review your application within 2-3 business days</li>
                    <li>You'll receive an email update on your application status</li>
                    <li>If selected, we'll contact you for the next steps</li>
                </ul>
            </div>
            
            <div class="info-box">
                <div class="info-title">💡 Meanwhile, you can:</div>
                <ul>
                    <li>Continue exploring other job opportunities</li>
                    <li>Keep your profile updated</li>
                    <li>Prepare for potential interviews</li>
                </ul>
            </div>
        </div>
        
        <div class="footer">
            <p><strong>Job Portal Team</strong></p>
            <p>Good luck with your application! 🍀</p>
            <hr style="margin: 20px 0; border: none; border-top: 1px solid #ddd;">
            <p style="font-size: 12px;">
                This is an automated message. For support, contact us at support@jobportal.com
            </p>
        </div>
    </div>
</body>
</html>