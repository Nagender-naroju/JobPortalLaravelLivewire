<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Status Update</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
            line-height: 1.6;
        }
        
        .container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
            animation: slideUp 0.6s ease-out;
        }
        
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 50px 40px;
            text-align: center;
            color: white;
            position: relative;
        }
        
        .header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        }
        
        .logo {
            width: 70px;
            height: 70px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255,255,255,0.1);
        }
        
        .header h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
            letter-spacing: -0.5px;
        }
        
        .header p {
            font-size: 18px;
            opacity: 0.9;
            font-weight: 400;
        }
        
        .content {
            padding: 50px 40px;
        }
        
        .greeting {
            font-size: 24px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 30px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .job-card {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 35px;
            border-left: 5px solid #667eea;
            transition: transform 0.3s ease;
        }
        
        .job-card:hover {
            transform: translateY(-2px);
        }
        
        .job-title {
            font-size: 20px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .job-desc {
            color: #6b7280;
            font-size: 15px;
        }
        
        .status-box {
            background: white;
            border-radius: 16px;
            padding: 40px;
            text-align: center;
            margin-bottom: 35px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            border: 1px solid #f1f5f9;
        }
        
        .status-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            font-weight: bold;
        }
        
        .status-approved .status-icon {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            box-shadow: 0 8px 25px rgba(16,185,129,0.3);
        }
        
        .status-rejected .status-icon {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            box-shadow: 0 8px 25px rgba(239,68,68,0.3);
        }
        
        .status-pending .status-icon {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
            box-shadow: 0 8px 25px rgba(245,158,11,0.3);
        }
        
        .status-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 15px;
            letter-spacing: -0.5px;
        }
        
        .status-approved .status-title { color: #059669; }
        .status-rejected .status-title { color: #dc2626; }
        .status-pending .status-title { color: #d97706; }
        
        .status-desc {
            font-size: 16px;
            color: #6b7280;
            line-height: 1.6;
            max-width: 400px;
            margin: 0 auto;
        }
        
        .action-section {
            background: linear-gradient(135deg, #1f2937 0%, #374151 100%);
            border-radius: 16px;
            padding: 35px;
            text-align: center;
            color: white;
            margin-bottom: 30px;
        }
        
        .action-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 12px;
        }
        
        .action-desc {
            opacity: 0.9;
            margin-bottom: 25px;
            line-height: 1.6;
        }
        
        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 32px;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(102,126,234,0.3);
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(102,126,234,0.4);
        }
        
        .footer {
            background: #f8fafc;
            padding: 35px 40px;
            text-align: center;
            color: #6b7280;
        }
        
        .company-name {
            font-size: 20px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 8px;
        }
        
        .tagline {
            font-size: 14px;
            margin-bottom: 20px;
            font-style: italic;
        }
        
        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .social-link {
            width: 40px;
            height: 40px;
            background: #e5e7eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #6b7280;
            transition: all 0.3s ease;
        }
        
        .social-link:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
        }
        
        .disclaimer {
            font-size: 12px;
            opacity: 0.7;
            border-top: 1px solid #e5e7eb;
            padding-top: 20px;
            margin-top: 20px;
        }
        
        @media (max-width: 600px) {
            .container { margin: 20px auto; }
            .header, .content { padding: 30px 25px; }
            .header h1 { font-size: 28px; }
            .greeting { font-size: 22px; }
            .social-links { flex-wrap: wrap; }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo">🚀</div>
            <h1>Application Update</h1>
            <p>Your career journey with us</p>
        </div>
        
        <!-- Content -->
        <div class="content">
            <div class="greeting">
                Hello {{ $applicant->name ?? 'Valued Candidate' }},
            </div>
            
            <!-- Job Information -->
            <div class="job-card">
                <div class="job-title">
                    💼 {{ $job->title ?? 'Senior Software Developer' }}
                </div>
                <div class="job-desc">
                    We have an important update regarding your application for this position.
                </div>
            </div>
            
            <!-- Status Display -->
            <div class="status-box 
                @if($status == 'approved') status-approved
                @elseif($status == 'rejected') status-rejected
                @else status-pending @endif">
                
                <div class="status-icon">
                    @if($status == 'approved') ✓
                    @elseif($status == 'rejected') ✗
                    @else ⏳ @endif
                </div>
                
                <div class="status-title">
                    @if($status == 'approved') Congratulations!
                    @elseif($status == 'rejected') Application Reviewed
                    @else Under Review @endif
                </div>
                
                <div class="status-desc">
                    @if($status == 'approved')
                        We're thrilled to move forward with your application! Our HR team will contact you soon with next steps.
                    @elseif($status == 'rejected')
                        Thank you for your interest. While we've chosen other candidates this time, we encourage future applications.
                    @else
                        Your application is being carefully reviewed. We'll update you as soon as there's progress.
                    @endif
                </div>
            </div>
            
            <!-- Call to Action -->
            <div class="action-section">
                <div class="action-title">
                    @if($status == 'approved') 🎯 Ready for Next Steps?
                    @elseif($status == 'rejected') 🌟 Explore More Opportunities
                    @else 💬 Questions or Concerns? @endif
                </div>
                <div class="action-desc">
                    @if($status == 'approved')
                        We're excited about your potential contribution to our team.
                    @elseif($status == 'rejected')
                        Stay connected with us for future opportunities that match your skills.
                    @else
                        Our team is here to assist you throughout the application process.
                    @endif
                </div>
                <a 
                    href="{{ $status == 'rejected' ? route('job.applications') : 'mailto:hr@company.com' }}" 
                    class="btn"
                >
                    @if($status == 'approved')
                        📧 Contact HR Team
                    @elseif($status == 'rejected')
                        🔍 View Open Positions
                    @else
                        💬 Get in Touch
                    @endif
                </a>

            </div>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <div class="company-name">{{ config('app.name') ?? 'TechCorp Innovation' }}</div>
            <div class="tagline">Where talent meets opportunity</div>
            
            <div class="social-links">
                <a href="#" class="social-link">💼</a>
                <a href="#" class="social-link">🐦</a>
                <a href="#" class="social-link">🌐</a>
                <a href="#" class="social-link">📧</a>
            </div>
            
            <div class="disclaimer">
                <p><strong>{{ config('app.name') ?? 'TechCorp' }} Talent Team</strong></p>
                <p>This is an automated message. Please contact HR for any questions.</p>
                <p>© 2025 {{ config('app.name') ?? 'TechCorp' }}. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>