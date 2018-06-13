#include <cstdio>
#include <string>
#include <iostream>
#include <cstring>

using namespace std;

int pangkat(int a, int b){

	int ans=1;
	for (int i=0; i<b; i++){
		ans = ans * a;
	}

	return ans;
}

int convert(string s, int idx){

	int ans = 0;
	int hitung = 0;
	for(int i=(idx+8)-1; i>=idx; i--){
		if (s[i] == 'P')
			ans+=pangkat(2, hitung);
		hitung++;
	}

	return ans;
}

int main(){

	int testcase;
	int n;
	string s;

	scanf("%d", &testcase);
	getchar();

	for (int i=0; i<testcase; i++){
		scanf("%d", &n);
		getchar();
		getline(cin, s);

		cout << "n " << n << "  s " << s << endl;

		printf("Case #%d: ", i+1);

		for (int j=0; j<n; j++){
			int temp = convert(s, j*8);

			printf("%c", char(temp));
		}
		printf("\n");
	}

	return 0;
}