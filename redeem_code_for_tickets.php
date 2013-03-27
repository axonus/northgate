<?
	include_once "_misc.php";

	$managerid			= $_REQUEST["managerid"];
	$redemption_code	= $_REQUEST["redemption_code"];
	$ticket1id			= $_REQUEST["ticket1"];
	$ticket2id			= $_REQUEST["ticket2"];

	showHeader();
?>
<?
	$time = time();
	$strSQL = "UPDATE redemption_codes SET ticket1id='$ticket1id',ticket2id='$ticket2id',dateandtime_redeemed='$time',redeemed_by_manager_id='$managerid' WHERE code='$redemption_code'";
	//echo $strSQL;
	mysql_query($strSQL);

?>

	<TR>
		<TD>
			<CENTER>
				Thank you.  Tickets <?echo $ticket1id;?> and <?echo $ticket2id;?> have
				been redeemed for code <?echo $redemption_code;?>.
				<BR>
				<BR>
				<BR>
				<A HREF="validate_redemptioncode.php?managerid=<?echo $managerid;?>">Validate another Redemption Code</A>
				<BR>
				<BR>

			</CENTER>
		</TD>
	</TR>
	<TR HEIGHT=5><TD></TR></TD>

<?
	showFooter();
?>