var
	n,a,i : longint;
	t: integer;
	b: array [1..1000000] of longint;
begin
	readln(n);
	for i:= 1 to n do begin
		read(a);
		readln(b[a]);
	end;
	readln(t);
	for i:= 1 to t do begin
		read(a);
		writeln(b[a]);
	end;
end.