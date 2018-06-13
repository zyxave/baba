#include <cstdio>
#include <iostream>
#include <string>
#include <cstring>

using namespace std;

int main(){

	int testcase;
	string s;

	scanf("%d", &testcase);
	getline(cin,s);
	for (int j=0; j<testcase; j++){
		getline(cin, s);

		int i=0;
		while (i<s.size()){

				int temp = s[i];
				if (temp==95 || temp==32){			//underscore and space
					s[i] = '-';
				}
				else if (temp>=65 && temp<=90){	//uppercase
					s[i] = char(temp+32);
					//printf("%c", s[i]);	
				}
				temp = s[i];
				if (i+1<s.size() && temp>=97 && temp<=122){
					int temp2 = s[i+1];
					if (temp2>=65 && temp2<=90){
						s.insert(i+1, "-");
						i++;
						
					}
				}
			//}

			//printf("%c", s[i]);
			i++;
		}
		//printf("\n");

		cout << s << endl;
	}

	

	return 0;
}