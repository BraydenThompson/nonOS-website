# About

nonOS is a website that I incementally developed for my CS401 Web Development course in Spring 2023. The site is build primarily using straight HTML, CSS, and JavaScript, with a PHP backend, a MySQL database and some additional JQuery components to meet course requirements. 

# Features
The website is designed to mimic the feel of using a desktop operating system, with each feature being in its own application "window". Inspiration for the layout came from similar desktop mimicing websites, some of which can be found here: https://github.com/syxanash/awesome-web-desktops. 

When logging in, you have the option of creating a new account, or generating a guest account. Passwords are properly hashed in the database, and page permissions are set up to disallow access to any other pages if you are not logged in.

Each window can be dragged around by the header bar, resized using the bottom right corner, closed, minimized, and made fullscreen. In the "Gallery" application, images can be uploaded to the site or "downloaded" to the desktop. Note: Since the site is hosted on a Heroku dyno that shuts down after ~30 minuites of inactivity, the images that are uploaded are not stored permanantly, as setting up an Amazon S3 image store or equivalent was outsite of the scope of this project. Clicking a download button on one of the gallery images creates a new window for that image, with a desktop shortcut and taskbar entry created as well.

Also, a lot of time was spent paying attention to how the fake OS "windows" interracted with the actual browser window the page is viewec through. Floating windows will automatically resize to fit within the browser, and fullcreen windows will "stick" to the size of the browser, always remaining fullscreen. There also is collision on the border of the page, preventing one from dragging a window outside of the screen. Alltogether, this should make it almost impossible to lose a window. 
