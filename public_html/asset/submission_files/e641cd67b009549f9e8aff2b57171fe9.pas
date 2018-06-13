var
	t,i,j: shortint;
	n,m,k,l: longint;
	s: string;
	index: longint;
begin
	readln(t);
	for i := 1 to t do begin
		readln(n,m);
		for j:= n to m do begin
			s:= j;
			for k:= 1 to (length(s)) do begin
				for l:= 1 to (length(s)) do begin
					if s[l] = s[k) then break;
				end;
			end;
		end;
		writeln(index);	
	end;
end.