var
	t,i,s,p,q,x,y,z,n,r,j: integer;
begin
	readln(t);
	for i := 1 to t do begin
		readln(n,p, q,r);
		for j :=1 to n do
		read(x,y,z);
		
		s:= p + q;
		
		if (s <= r) then begin
			writeln(s);
		end else begin
			writeln('Andi tidak bisa mengikuti seminar');
		end;
	end;
end.