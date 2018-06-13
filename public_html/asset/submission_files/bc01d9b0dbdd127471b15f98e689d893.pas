var
	t,i,s,p,a,m,r: longint;
begin
	readln(t);
	for i := 1 to t do begin
		readln(p,a,m,r);
		s := 0;
		repeat
			r := r - p;
			if (p >= m) then
				p := p - a;
			inc(s);
		until (r <= p);
		writeln(s);
	end;
end.