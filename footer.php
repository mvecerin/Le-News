  </main>
   <?php
   if($dbc){
    mysqli_close($dbc);
   }
    ?>
   <footer>
       <section class="fifty-center">
        <p class="center-text">Martina Večerin, mvecerin@tvz.hr, <?php echo date('Y');?></p>
       </section>
    </footer>
</body>
</html>