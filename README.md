# AO_backend
analytics tool.


# Authentication


# Unprotected routes
/api/auth/login						POST

/api/auth/logout					GET|HEAD

/api/auth/register					POST

/api/auth/password/reset				POST

# Protected routes
/api/user			get users		GET|HEAD

/api/dashboard		Dashboard view		GET|HEAD


# Json fromat
{

   “message”:””,
   
     “payload”:{
     
		},
		
      “status”: ”success” or ”fail”
      
}

