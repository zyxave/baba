var
	t,i,s,p,a,m,r: longint;
begin
	readln(t);
	for i := 1 to t do begin
		readln(p,a,m,r);
		s := 0;
		while (r > p) do begin
			r := r - p;
			if (p >= m) then
				p := p - a;
			s := s + 1;
		end;
		writeln(s);
	end;
end.