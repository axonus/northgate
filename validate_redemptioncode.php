<?
	include_once "_misc.php";

	$redemption_code	= $_REQUEST["redemption_code"];
	$managerid			= $_REQUEST["managerid"];

	showHeader();
?>

<!--	<TR><TD><CENTER>Enter the ticket redemption code to validate:</CENTER></TD></TR>-->
	<TR><TD><CENTER>Enter the ticket redemption code and customer phone number to validate:</CENTER></TD></TR>
	<TR HEIGHT=5><TD></TR></TD>
	<TR>
		<TD>
			<CENTER>
				<FORM ACTION="validate_redemptioncode2.php">
					<INPUT TYPE=HIDDEN NAME=managerid VALUE="<?echo $managerid;?>">
  
					<TABLE BORDER=0>
						<TR>
							<TD ALIGN=LEFT VALIGN=TOP>Redemption<BR>Code: </TD>
							<TD VALIGN=BOTTOM><INPUT TYPE=TEXT SIZE=15 ID=redemption_code NAME=redemption_code VALUE="<?echo $redemption_code;?>"></TD>
						</TR>
						<TR>
							<TD ALIGN=LEFT VALIGN=TOP>Phone<BR>Number: </TD>
							<TD VALIGN=BOTTOM><INPUT TYPE=TEXT SIZE=15 ID=phonenumber NAME=phonenumber VALUE="<?echo $phonenumber;?>"></TD>
						</TR>
						<TR HEIGHT=15><TD>&nbsp;</TD></TR>
						<TR>
							<TD ALIGN=CENTER COLSPAN=2>
								<INPUT TYPE=SUBMIT VALUE="Validate">
							</TD>
						</TR>
					</TABLE>

				</FORM>
			</CENTER>
		</TD>
	</TR>

<?
	showFooter();
?>