#!/user/bin/perl -w
##user strict;
require IO::Socket;

my $url = '192.168.1.99';
my $socket = IO::Socket::INET->new(
Proto => 'tcp',
PeerAddr => $url,
PeerPort => 80)||die "[!] Can not connect...\n";
print"Connecting to $url\n";
print $socket"GET /&HTTP/1.0\n\n";

$socket->recv(my $data,1024);
print"$data\n";
close($socket);
@bee=split(/\n/,$data);
print "$bee[4]\n\n";
@mine=split(/\|/,$bee[4]);
print "$mine[0]  \n";
print "$mine[1]  \n";
print "$mine[2]  \n";
print "$mine[3]  \n";

