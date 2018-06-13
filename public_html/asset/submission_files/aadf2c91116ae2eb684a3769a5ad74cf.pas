var
	t,i,s,p,a,m: byte;
	r: longword;
begin
	readln(t);
	for i := 1 to t do begin
		read(p,a,m,r);
		s := 0;
		s := trunc((p-m)/a)-1;
		repeat
			r := r - p;
			s := s + 1;
		until (r <= p);
		writeln(s);
	end;
end.