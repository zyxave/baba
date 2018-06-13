var
	t,n,x,i,j,k : longint;
begin
	readln(t);
	for i := 1 to t do begin
		readln(n);
		x := (1/2*sqr(n)) - (1/2*x); 
		writeln(x);
	end;
end.