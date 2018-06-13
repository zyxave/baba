var
	t,i,s: longint;
	p,a,m,r: array[1..100] of longint;
begin
	readln(t);
	for i := 1 to t do
		readln(p[i],a[i],m[i],r[i]);
		
	for i := 1 to t do begin
		s := 0;
		repeat
			r[i] := r[i] - p[i];
			if (p[i] >= m[i]) then
				p[i] := p[i] - a[i];
			inc(s);
		until (r[i] <= p[i]);
		writeln(s);
	end;
end.