<?
	$managerid = $_REQUEST["managerid"];
?>
<?
	include_once "_misc.php";

	showHeader();
?>



	<TR><TD><CENTER>Login with your Manager ID and password:</CENTER></TD></TR>
	<TR HEIGHT=5><TD></TR></TD>
	<TR>
		<TD>
			<CENTER>
				<FORM ACTION="managerlogin2.php">
					<TABLE BORDER=0>
						<TR><TD ALIGN=RIGHT>ID: <INPUT TYPE=TEXT SIZE=10 ID=managerid NAME=managerid VALUE="<?echo $managerid;?>"></TD></TR>
						<TR HEIGHT=5><TD></TD></TR>
						<TR><TD ALIGN=RIGHT>Password: <INPUT TYPE=TEXT SIZE=10 ID=password NAME=password></TD></TR>
						<TR HEIGHT=15><TD></TD></TR>
						<TR><TD ALIGN=CENTER>
							<INPUT TYPE=SUBMIT VALUE="Login">
						</TD></TR>
					</TABLE>
				</FORM>
			</CENTER>
		</TD>
	</TR>


<?
	showFooter();
?>