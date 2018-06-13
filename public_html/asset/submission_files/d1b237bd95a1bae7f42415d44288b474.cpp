// C++ program to count occurrences of a given
// character
#include <iostream>
#include <string>
using namespace std;
int hasil[26];
int t;
bool jadi;
// Function that return count of the given 
// character in the string
int count(string s, char c)
{
    // Count variable
    int res = 0;
 
    for (int i=0;i<s.length();i++)
 
        // checking character in string
        if (s[i] == c)
            res++;
 
    return res;
}
 
 int maxRepeating(int* arr, int n, int k)
{
    // Iterate though input array, for every element
    // arr[i], increment arr[arr[i]%k] by k
    for (int i = 0; i< n; i++){
    	if (arr[i] != 0){
    		 arr[arr[i]%k] += k;
    	}
	}
       
 
    // Find index of the maximum repeating element
    int max = arr[0], result = 0;
    for (int i = 1; i < n; i++)
    {
    	if (arr[i] != 0){
		
        if (arr[i] > max)
        {
            max = arr[i];
            result = i;
        }
    }
    }
 
    /* Uncomment this code to get the original array back
       for (int i = 0; i< n; i++)
          arr[i] = arr[i]%k; */
 
    // Return index of the maximum element
    return result;
}
// Driver code
int main()
{
	cin >> t;
	for(int y=0; y<t; y++){
	jadi = true;
    string str;
    cin >> str;
    //cout << count(str, c) << endl;

     for(int i=97; i<123; i++){
     hasil[i-97] = count(str,i);
     //cout<< hasil[i-97];
     //cout << hasil[i-97]-1;
	 //cout << count(str,i) << i-97;
	 //cout <<endl;
	 }
  
    int n = sizeof(hasil)/sizeof(hasil[0]);
    int k = sizeof(hasil);
    int max =  maxRepeating(hasil, n, k);
 	//cout <<"max" << max;
 	 for(int i=97; i<123; i++){
     hasil[i-97] = count(str,i);
 }
 	
 	for(int x = 0; x<26; x++){
 		if(hasil[x] != 0){
		 
     	if(hasil[x] != max){
     	
     		jadi = false;
     		break;
     		
		 }
		}
	 }
	 if(jadi == false){
	 	//	cout <<"trigger";
     for(int x = 0; x<26; x++){
     	if(hasil[x] != max){
     	
     		if((hasil[x]-1) == max || (hasil[x]-1) == 0){
     			//cout << hasil[x]-1;
     			//cout <<endl;
     			jadi = true;
     			hasil[x]--;
     			//cout <<"trigger true";
     			break;
     			
			 }
		 }
	 }
}
for(int x = 0; x<26; x++){
 		if(hasil[x] != 0){
		 
     	if(hasil[x] != max){
     		//cout <<"trigger";
     		jadi = false;
     		break;
     		
		 }
		}
	 }
   if(jadi == true){
   	cout << "YES"<<"\n";
   }else if(jadi == false){
   	cout << "NO"<<"\n";
   }
}
    return 0;
}
