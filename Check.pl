# !/usr/bin/perl -w
##use strict;

use DBI;
require IO::Socket;
my $url = '192.168.1.99';
my $socket = IO::Socket::INET->new (
Proto => 'tcp',
PeerAddr => $url,
PeerPort => 80) || die "[!] Can not connect...\n";
print "Connecting to $url\n";
print $socket "GET /& HTTP/1.1\n\n";
$socket->recv(my $data, 1024);
print "$data \n";
@bee=split(/\n/,$data);
print "$bee[4]\n\n";
@mine=split(/\|/,$bee[4]);

print "$mine[0]\n";
print "$mine[1]\n";
print "$mine[2]\n";
print "$mine[3]\n";
$zero = "0.00";
#!/usr/local/bin/perl
 
#connect to mysql
my $dbh = DBI->connect("DBI:mysql:database=bee;host=localhost",
 "root", "root",{'RaiseError' => 1});
if ($mine[0] eq $zero)
{
 print "The Room 1 OFF\n";
 # Now retrieve data from the table.
 my $sth = $dbh->prepare("SELECT * FROM room1 order by id desc limit 1");
 $sth->execute();
 my $ref = $sth->fetchrow_hashref();
 print "Found a row: id = $ref->{'id'}, status = $ref->{'status'}\n";
 print "$ref->{'status'}\n";
 $mind = $ref->{'status'};
 print " mind is $mind \n";
 if ($mind eq "on" )
 {
 $dbh->do("INSERT INTO room1 VALUES (null,curdate(),curtime(),". $dbh-
quote("on_to_off") .")");
 $dbh->do("INSERT INTO room1out VALUES (null,curdate(),curtime(),". $dbh-
quote("on_to_off") .")");
 print "insert room 1 off leaw\n";
 print "------------------------------\n";
 }
 else
 {
 print " mysql line end is off\n";
 print "------------------------------\n";
 }
}
else { print "THE Room 1 is ON\n";
my $sth = $dbh->prepare("SELECT * FROM room1 order by id desc limit 1");
 $sth->execute();
 my $ref = $sth->fetchrow_hashref();
 print "Found a row: id = $ref->{'id'}, status = $ref->{'status'}\n";
 print "$ref->{'status'}\n";
 $mind = $ref->{'status'};
 print " mind is $mind \n";
 if ($mind ne "on")
 {
 $dbh->do("INSERT INTO room1 VALUES (4,curdate(),curtime(),$mine[0])");
 #  $dbh->do("INSERT INTO room1 in VALUES (4,curdate(),curtime(),"$mine[0])");
 print "insert Mysql on in table leaw na\n";
 print "------------------------------\n";
 }
 else
 {
 print " mysql line end is on\n";
 print "------------------------------\n";
 $sth->finish();
 $dbh->disconnect(); # Disconnect from the database.
 exit;
 }
}

 use warnings;
use strict;
