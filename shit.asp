<% 
set db=server.createobject("adodb.connection") 

db.Open ("driver={SQL Server};server=SQLEXPRESS;uid=sa;pwd=123;database=test;")

set rs=server.createobject("adodb.recordset")

 sql = "exec shit" 
 
 rs.open sql,db,3,2

response.write rs.recordcount&"<br>" 

while not rs.eof 

response.write rs("one")&"<br>"    

rs.movenext

wend 

response.End %>
