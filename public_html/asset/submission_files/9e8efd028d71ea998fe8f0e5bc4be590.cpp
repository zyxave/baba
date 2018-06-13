#include <cstdio>

using namespace std;

bool gakDisukai(int n){

	bool digit[10];

	for (int i=0; i<10; i++){
		digit[i]=true;
	}

	while (n>0){
		int temp = n%10;

		if (digit[temp]==false){
			return true;
		}

		else{
			digit[temp]=false;
		}
	}

	return false;
}

int main(){

	int testcase;
	int m, n;

	scanf("%d", &testcase);
	for (int i=0; i<testcase; i++){

		scanf("%d %d", &n, &m);
		int ans =0;

		for (int j=n; j<=m; j++){
			if (gakDisukai(j))
				ans++;
		}

		printf("Case #%d: %d\n", i+1, ans);
	}


	return 0;
}