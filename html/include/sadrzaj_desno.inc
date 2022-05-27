<DIV id="exchange" class="box">
	<TABLE cellSpacing="0" cellPadding="0" width="100%">
	<TBODY>
	  
		<TR class="blue top" align="center">
			<TD colSpan="2">Kursna lista</TD></TR>	
		<TR>
			<TD>
				<iframe src="http://www.kursna-lista.info/resources/kursna-lista.php?format=2&br_decimala=4&promene=1&procenat=1&zastavice=1&datum=1" width="174px" height="230px" frameborder="0" scrolling="no"></iframe>
			</TD>	
		</TR>

		<TR class="bottom">
			<TD style="font-size: 11px;" colSpan="2">izvor: <A href="http://www.kursna-lista.info/" target="_blank">www.kursna-lista.info</A></TD>
		</TR>

		<TR><TD> </TD></TR>	
		
		<TR class="blue top" align="center">
			<TD colSpan="2">Vremenska prognoza</TD>
		</TR>
		<TR>
			<TD>
				<iframe id="iframe_navidiku_vreme" src="http://www.navidiku.rs/webtools/vreme//FFFFFF/EFEFEF/000000/FFFFFF/CFCFCF/15/2/YIXX0030/trenutno-vreme.html" frameborder="0"  scrolling="auto" height="200"  width="173"></iframe><div width="173"  ></div>
			</TD>
		</TR>
		<TR class="bottom">
			<TD style="font-size: 11px;" colSpan="2">izvor: <a id="navidiku_vreme" href="http://www.navidiku.rs/vremenska-prognoza/" target="_blank">Na vidiku</a></A></TD>
		</TR>
		
		<TR><TD></TD></TR>	
		
		<TR class="blue top" align="center">
			<TD colSpan="2"> <A href="template_misli.php">Misao dana</A></TD>
		</TR>
		<TR>
			<TD>
				<?php 
				   prikazi_misao(0);
				?>  									
			</TD>
		</TR>
		<TR class="bottom">
			<TD style="font-size: 11px;" colSpan="2">izvor: Internet</A></TD>
		</TR>
		
		</TBODY>
	</TABLE>
</DIV>