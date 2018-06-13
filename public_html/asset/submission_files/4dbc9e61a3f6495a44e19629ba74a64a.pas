var
	t,i,s,p,a,m: byte;
	r: longword;
begin
	readln(t);
	for i := 1 to t do begin
		readln(p,a,m,r);
		s := 0;
		repeat
			r := r - p;
			p := p - a;
			s := s + 1;
		until (p <= m);
		repeat
			r := r - p;
			s := s + 1;
		until (r <= p);
		writeln(s);
	end;
end.