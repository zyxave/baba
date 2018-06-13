var
	N, A, B, x, jumlah, kembalian: longint;
begin
	readln(N);
	for x:=1 to N do
	begin
		jumlah:=0;
		readln(A, B);
		kembalian:=A-B;
		jumlah:=jumlah+(kembalian div 100);
		kembalian:=kembalian-100*(kembalian div 100);
		jumlah:=jumlah+(kembalian div 20);
		kembalian:=kembalian-20*(kembalian div 20);
		jumlah:=jumlah+(kembalian div 5);
		kembalian:=kembalian-5*(kembalian div 5);
		jumlah:=jumlah+(kembalian div 1);
		kembalian:=kembalian-1*(kembalian div 1);
		writeln(jumlah);
	end;
end.