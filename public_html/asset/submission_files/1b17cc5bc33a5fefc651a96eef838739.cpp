#include <iostream>
#include <string.h>
using namespace std;

int T,l,tmp[25],k,rules[10];
char s[1000000];

int main(){
	
	cin >> T;
	for (int g=0;g<T;g++){
		cin >> s;
		l = strlen(s);
		int c=0;
		for (int d=0;d<l;d++){
			k=0;
			while (k<l){
				if (s[k] == s[k+1]){
				tmp[c]++;	
				}else {
				c++;
				k=l;
				}
			k++;	
			}
		}
		c--;
	while ((c)--){
		int z = 0;
		while (k<c)
		if (tmp[k] == tmp[k+1]){
		 rules[g] = 1; 
		}
		else{
			rules[g] = 0;
		} 
	}		
		
	}
	for (int s=0;s<T;s++){
		if (rules[s]==1){
			cout << "YES" << endl;
		}
		else {
			cout << "NO" << endl;
		}
	}
	return 0;
}
