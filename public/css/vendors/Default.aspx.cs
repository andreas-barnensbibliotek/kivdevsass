using System;
using System.Collections.Generic;
using System.Linq;
using System.Collections;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Web;
using System.Web.SessionState;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.UI.HtmlControls;



public partial class _Default : System.Web.UI.Page 
{
    protected void Page_Load(object sender, EventArgs e){
        clsTalivastController obj = new clsTalivastController();
        
        string goToUrl = Request.QueryString["sida"];
        string attr = Request.QueryString["attr"];

        Response.Redirect(obj.Navproxy(goToUrl, attr));
      

    }
  
}
