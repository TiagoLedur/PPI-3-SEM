
<?php
include '../includes/menu.php';
?>
        
        
        <div class="container text-center">
            
            <br>
            
            <h2>Formulário</h2>
            
            <div class="row">
                <div class="col">
                    <br>          
        <form action="insert.php" method="GET" >
            <div class="p-3"><input placeholder="Nome" type="text" name="nome"      id="nome"></div>
            <div class="p-3"><input placeholder="Sobrenome" type="text" name="sobrenome" id="sobrenome"></div>
            <div class="p-3"><input placeholder="Idade" type="text" name="idade"     id="idade"></div>
            <div class="p-3"><input type="submit" value="Cadastrar" /></div>
            
        </form>
                                      
                </div>
             </div>   
        </div>
      
  </body>
</html>
     