<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Email</title>
</head>
<body>
    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2>New Contact Form Submission</h2>
        
        <p><strong>Name:</strong> {{ $name ?? ''}}</p>
        <p><strong>Email:</strong> {{ $email ?? ''}}</p>

        <p><strong>Subject:</strong> {{ $subject ?? ''}}</p>
        
        <div style="margin: 20px 0;">
            <h3>Message:</h3>
            <p style="background: #f5f5f5; padding: 15px; border-radius: 5px;">
                {{ $contactMessage ?? '' }}
            </p>
        </div>
        
        <hr style="border: 1px solid #eee; margin: 20px 0;">
        
        <p style="color: #666; font-size: 12px;">
            This email was sent from the contact form on your website.
        </p>
    </div>
</body>
</html>
