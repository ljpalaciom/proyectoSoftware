# Programming rules
1. Rules for controllers

    * Never do an echo inside a controller
    
    * The responsibility of the controllers should be solely to manage the HTTP requests and return an adequate response. For example,      validation rules should not be included within a controller.
    
    * It should always be extended from the Controller class which is from Laravel.
    
    * The texts that go to the view cannot be written explicitly, on the contrary they must use the lang files and import the text that they require.

2. Rules for models

    * The getters and setters of the attributes that will be accessed within the application must be specified. These attributes should not be entered directly if not via getters and setters.
    
    * The attributes that the user can enter must be specified in the fillable protected variable.
    
    * It must always be extended from the Eloquent Model class.

3. Rules for views

    * All views must extend from the master layout.
    
    * All views must use blade.
    
    * Never open and close php in views.
    
    * Never add a javascript or css inside the views, they must go in separate files and be imported.
    
    * The texts cannot be written explicitly, on the contrary they must use the lang files and import the required text.

4. Rules for routes

    * All routes must be associated with a controller.
    
    * No url must specify the method type in its name. For example it is wrong to use routes like:
    
        * / productPost
        * / product / post
