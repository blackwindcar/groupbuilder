package servlet;

import java.io.IOException;

import javax.servlet.ServletException;
import javax.servlet.ServletOutputStream;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;

@WebServlet(
        name = "MyServlet", 
        urlPatterns = {"/teste"}
    )
public class HelloServlet extends HttpServlet {

    @Override
    protected void doGet(HttpServletRequest req, HttpServletResponse resp)
            throws ServletException, IOException {
        ServletOutputStream out = resp.getOutputStream();
        out.write("hello heroku".getBytes());
	teste();
        out.flush();
        out.close();
    }
	
	 public void teste() {
      Connection c = null;
      Statement stmt = null;
      try {
         Class.forName("org.postgresql.Driver");
         c = DriverManager
            .getConnection("jdbc:postgres://eeohxpbrlzrlcl:868c3dd20dd050693776d798d49e1607fea9dabcba9af36cf8fb7925adff07cc@ec2-176-34-110-252.eu-west-1.compute.amazonaws.com:5432/detr694t0fv3r4",
            "detr694t0fv3r4", "5432");
			teste();
         c.setAutoCommit(false);
         System.out.println("Opened database successfully");

         stmt = c.createStatement();
         ResultSet rs = stmt.executeQuery( "SELECT * FROM COMPANY;" );
         while ( rs.next() ) {
            int id = rs.getInt("id");
            String  name = rs.getString("name");
            int age  = rs.getInt("age");
            String  address = rs.getString("address");
            float salary = rs.getFloat("salary");
            out.write( "ID = " + id + "</br>" );
            out.write( "NAME = " + name + "</br>" );
            out.write( "AGE = " + age + "</br>" );
            out.write( "ADDRESS = " + address+ "</br>"  );
            out.write( "SALARY = " + salary + "</br>" );
            out.write();
         }
         rs.close();
         stmt.close();
         c.close();
      } catch ( Exception e ) {
         System.err.println( e.getClass().getName()+": "+ e.getMessage() );
         System.exit(0);
      }
      System.out.println("Operation done successfully");
   }
    
}
