                                                                                 var
 t,i:longint;
 n:array [1..10000] of longint;
begin
	readln(t);
	for i:=1 to t do
		begin
			readln(n[i]);
		end;
	for i:=1 to t do
	 writeln(n[i]*n[i]);
end.
