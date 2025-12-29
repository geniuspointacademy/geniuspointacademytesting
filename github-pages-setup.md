# GitHub Pages Deployment Guide

## 1. Repository Structure

## 2. Enable GitHub Pages
1. Go to repository → Settings → Pages
2. Source: Deploy from a branch
3. Branch: main (or master)
4. Folder: / (root)
5. Save

## 3. Image Management
Since GitHub Pages doesn't support file uploads:
1. Manually upload tutor images to `assets/images/`
2. In admin portal, enter only filename (e.g., `e-simple.png`)
3. Main website will look for images in `assets/images/`

## 4. Testing Email
1. Open `admin.html` in browser
2. Login with password: `teamgpa`
3. Make changes
4. Click "Send Email Notification"
5. Check `helpinghandshallneverfall@gmail.com`
6. **IMPORTANT**: Click confirmation link in FormSubmit email

## 5. Troubleshooting
- **Email not sending**: Check browser console (F12) for errors
- **Images not showing**: Verify image paths in admin portal
- **Changes not saving**: Clear localStorage: `localStorage.clear()`
- **Deployment errors**: Check GitHub Actions tab for details
