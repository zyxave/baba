var
	t,i: integer;
	s: string;
	j,k: longint;
begin
	readln(t);
	for i:= 1 to t do begin
		readln(s);
		for j:=1 to length(s) do begin
			if s[j] = ' ' then s[j] := '-'
			else if s[j] = '_' then s[j] := '-'
			else if (ord(s[j]) >= 65) and ((s[j] = ' ') or (s[j] = '_') or (s[j] = '-')) then s[j] := chr(ord(s[j]) + 32)
			else begin 
			s[j] := chr(ord(s[j]) + 32);
				for k:=length(s) downto j do begin
					s[k+1] := s[k];
				end;
			end;
		end;
		writeln(s);
	end;
end.