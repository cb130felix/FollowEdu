<%-- 
    Document   : newjsp
    Created on : 08/09/2015, 14:39:36
    Author     : Renan
--%>

<%@page import="java.util.ArrayList"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>

<%@page language="java" import="Atividade.Cliente"%>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Hello World!</h1>
        <%!  ArrayList<Cliente> c = new ArrayList<Cliente>(); %>
        <%
            
            //iniciando os clientes
            for(int i = 0; i < 5; i++){
            
                c.add(new Cliente("" + i, "...", 2));
                
            }
        
                out.print("<table>");

            //imprimindo paradas
                float total = 0;
            for(int i = 0; i < 5; i++){
                out.print("<tr>");
                out.print("<td>" + c.get(i).getCPF() +"</td>");
                out.print("<td>" + c.get(i).getNome() +"</td>");
                out.print("<td>" + c.get(i).getValorComprado() +"</td>");
                out.print("</tr>");
                total += c.get(i).getValorComprado();
            
            }
            out.print("</table>");
            
            out.print("Total: " + total);
            
            
        %>
        
        
    </body>
</html>
