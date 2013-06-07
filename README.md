simple_mvc_oop_php
==================

This is simple three tier architecture for creating php web applications. It follows the model, view and control architecture.
This type of architecture really speed ups the app. There are many frameworks available which provides the same mvc architecture
but those frameworks are really very huge and we need time to learn those frameworks ( and my personal feeling is, building 
ajax based app with these frameworks is big headech ). So I build very simple mvc oop php mini framework. It will take just
30 r 40 mints to understand this.

Folder and file descriptions :

  1. config folder : it contains two files
        1. AppConfig.php: It contains core configurations to build controllers and link that controller to view layer
        2. includes.php: It contains all includes needs to run this app. we have to include our every model in this file
  2. controller folder: here we need to create controller files
  3. model folder : every model we build resides here
  4. public folder : this is the only folder visible to user. every public files like js, images, css, and any file that is
                      public need to put here
  5. index.php : nothing to do with this file, it just redirects to public folder

Steps to do :

  1. first to create a page, we need to create page in public folder. checkout index.php file. this is the entry point to the user 
  2. we need to create a controller for this file just go to controller folder and create a file with the name that you have passed earlier. checkout existed files to understand
  3. after that you need to create a view file in view folder with the name you passed earlier
  4. if needed, you can create your own model in model folder and needs to include in includes.php file


If anybody interested to use this framework can contact me for more explinations and information to know how to use..

Thank You
